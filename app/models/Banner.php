<?php
namespace App\Models;

use Core\Model;

class Banner extends Model
{
     protected $id;
     protected $title;
     protected $subtitle;
     protected $content;
     protected $image;
     protected $button;
     protected $url;

     public function __construct() {
		$this->table = 'banners';
	}

}