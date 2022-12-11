<?php

namespace App\Models;

use Core\Model;

class Category extends Model
{
    public $id;
    public $parent_id;
    public $category;
    public $image;

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

    // save
    public function save() {
        $category = (new Category)->add([
            'category' => $this->category,
            'parent_id' => $this->parent_id ? $this->parent_id : 0,
            'image' => "dress.svg",
        ]);
    }
}