<?php
namespace App\Models;

use Core\Model;

class Product extends Model
{
     public $id;
     public $title;
     public $category;
     public $category_name;
     public $brand;
     public $price;
     public $description;
     public $image1;
     public $image2;
     public $keywords;
     public $rating;
     public $new_arrival;
     public $deal_of_the_day;
     public $trending;

     public function __construct() {
		$this->table = 'products';
          $this->primary = 'id';
	} 

     public static function countByCategory($id) {
         return (new Product)->where(['category'=> $id])->count();
     }

     public function save() {
          $brand = (new Product)->add([
              'title' => $this->title,
               'category' => $this->category,
               'brand' => $this->brand,
               'price' => $this->price,
               'description' => $this->description,
               'image1' => $this->image1,
               'image2' => $this->image2,
               'keywords' => $this->keywords,
               'rating' => $this->rating,
               'new_arrival' => $this->new_arrival,
               'deal_of_the_day' => $this->deal_of_the_day,
               'trending' => $this->trending,

          ]);
      }

}