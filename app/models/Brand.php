<?php
namespace App\Models;

use Core\Model;

class Brand extends Model
{
     public $brand_id;
     public $brand_title;

     public function __construct() {
		$this->table = 'brands';
          $this->primary = 'brand_id';
	} 

     public static function countByCategory($id) {
         return (new Product)->where(['brand'=> $id])->count();
     }

     public function save() {
          $brand = (new Brand)->add([
              'brand_title' => $this->brand_title
          ]);
      }

}