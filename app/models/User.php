<?php
namespace App\Models;

use Core\Model;

class User extends Model
{
     protected $id;
     protected $title;
     protected $category;
     protected $brand;
     protected $price;
     protected $description;
     protected $image;
     protected $keywords;

     public function __construct() {
		$this->table = 'users';
	}

}