<?php

namespace App\Models;

use Core\Model;

class Category extends Model
{
    protected $id;
    protected $parent_id;
    protected $category;
    protected $image;

    public function __construct() {
		  $this->table = 'categories';
	  }  

    public static function parent($id) {
        $parent = (new Category)->fetch($id);
        return $parent;
    }

    // find
    public static function find($id) {
        $category = (new Category)->where(['id'=>$id])->fetch($id);
        return $category;
    }

    public static function children($id) {
        $children = (new Category)->where(['parent_id'=>$id])->fetchAll();
        return $children;
    }
}