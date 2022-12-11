<?php
namespace App\Models;

use Core\Model;

class Product extends Model
{
     protected $id;
     protected $title;
     protected $category;
     protected $category_name;
     protected $brand;
     protected $price;
     protected $description;
     protected $image1;
     protected $image2;
     protected $keywords;
     protected $rating;
     protected $new_arrival;
     protected $deal_of_the_day;
     protected $trending;

     public function __construct() {
		$this->table = 'products';
          $category = Category::find($this->category);
          if($category) {
               $this->category_name = $category['category'];
          }else{
               $this->category_name = 'No Category';
          }
	} 

     public static function countByCategory($id) {
         return (new Product)->where(['category'=> $id])->count();
     }

}