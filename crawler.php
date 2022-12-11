<?php

error_reporting(E_ERROR | E_PARSE);
// crawler read content from https://www.musicstore.com/en_RU/RUB

use App\Models\Category;
use App\Models\Product;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ .'/config/config.php';

class Crawler
{
	public function __construct()
	{
		$this->url = 'https://www.musicstore.com/en_RU/RUB';
		$this->content = file_get_contents($this->url);
	}

	public function getCategories()
	{
		//ul.mainNavigation-list > li > div.skew > div > a.entry
		$dom = new DOMDocument();
		$dom->loadHTML($this->content);
		$xpath = new DOMXPath($dom);
		$elements = $xpath->query('//ul[@class="kor-mainNavigation-list mainNavigation-list"]/li/div/div/a[@class="entry"]');
		$categories = array();
		foreach ($elements as $element) {
			$url  = $element->getAttribute('href');
			$text = $element->nodeValue;

			// check if category exists
			$category = (new Category)->where(['category'=> $text])->fetch();

			if(!$category){
				$category = new Category();
				$category->parent_id = 0;
				$category->level = 0;
				$category->category = $text;
				$category->image = 'dress.svg';
				$id = +$category->save();

				$this->saveSubCategories($url, $id,1);

			} else{
				$this->saveSubCategories($url, $category['id'],1);
			}
			

		}


	}

	// saveSubCategories
	public function saveSubCategories($url, $parent_id,$level)
	{
		//name :  div.category-container-tile > a.clearfix > div.category-name-box > div.name-wrapper > div.name > span
		//image :  div.category-container-tile > a.clearfix > div.image > img
		//url :  div.category-container-tile > a.clearfix 

		$content = file_get_contents($url);
		$dom = new DOMDocument();
		$dom->loadHTML($content);
		$xpath = new DOMXPath($dom);
		$elements = $xpath->query('//div[@class="category-container-tile col-xsp-12 col-sm-6 col-md-4 col-lg-3 col-xlg-2"]/a[@class="clearfix"]/div[@class="category-name-box"]/div[@class="name-wrapper"]/div[@class="name"]/span');
		$categories = array();
		foreach ($elements as $element) {
			$text = $element->nodeValue;

			$category = (new Category)->where(['category'=> $text])->fetch();

			if(!$category){
				$category = new Category();
				$category->parent_id = $parent_id;
				$category->level = $level;
				$category->category = $text;
				$category->image = 'dress.svg';
				$id = +$category->save();

				$this->saveSubCategoriesx2($url, $id,$level + 1);

			} else{
				$this->saveSubCategoriesx2($url, $category->id,$level + 1);
			}
		}

	}

	public function saveSubCategoriesx2($url, $parent_id,$level)
	{
		$content = file_get_contents($url);
		$dom = new DOMDocument();
		$dom->loadHTML($content);
		$xpath = new DOMXPath($dom);
		$elements = $xpath->query('//div[@class="category-container-tile col-xsp-12 col-sm-6 col-md-4 col-lg-3 col-xlg-2"]/a[@class="clearfix"]/div[@class="category-name-box"]/div[@class="name-wrapper"]/div[@class="name"]/span');
		$categories = array();
		foreach ($elements as $element) {
			$text = $element->nodeValue;

			$category = (new Category)->where(['category'=> $text])->fetch();

			if(!isset($category['id'])){
				$category = new Category();
				$category->parent_id = $parent_id;
				$category->level = $level;
				$category->category = $text;
				$category->image = 'dress.svg';
				$category->save();
			} 
		}

		$elements = $xpath->query('//div[@class="category-container-tile col-xsp-12 col-sm-6 col-md-4 col-lg-3 col-xlg-2"]/a[@class="clearfix"]');

		foreach ($elements as $element) {
			$url  = $element->getAttribute('href');
			$this->saveProducts($url, $category);
		}

	}

	public function saveProducts($url, $category){
	
		$content = file_get_contents($url);
		$dom = new DOMDocument();
		$dom->loadHTML($content);
		$xpath = new DOMXPath($dom);
		$productsTiles = $xpath->query('//div[@class="tile-product"]');

		foreach ($productsTiles as $productTile) {
			// read a image from div.kor-product-photo > img 
			$images  = $xpath->query('div[@class="kor-product-photo"]/img', $productTile);
			$imageUrl = $images ? $images->item(0)->getAttribute('src'): "";

			$name = $xpath->query('a[@class="name"]', $productTile);
			$nameText = $name->item(0)->nodeValue;

			$price = $xpath->query('span[@class="final"]', $productTile);
			$priceText = $price->item(0)->nodeValue;
			

			$product = new Product();
			$product->category = $category['id'];
			$product->category_name = $category['category'];
			$product->name = $nameText;
			$product->price = $priceText;
			$product->image1 = $imageUrl;
			$product->image2 = $imageUrl;
			$product->brand = 0;
			$product->description = '';
			$product->rating = 0;
			$product->keywords = '';
			$product->new_arrival = 0;
			$product->deal_of_the_day = 0;
			$product->trending = 0;
			$product->save();
		}


	}
}

$crawler = new Crawler();
$crawler->getCategories();
