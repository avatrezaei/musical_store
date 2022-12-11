<?php
namespace App\Models;

use Core\Model;

class Brand extends Model
{
     protected $brand_id;
     protected $brand_title;

     public function __construct() {
		$this->table = 'brands';
	} 

     public static function countByCategory($id) {
         return (new Product)->where(['brand'=> $id])->count();
     }

}