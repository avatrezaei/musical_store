<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\User;

class CategoryController extends \Core\Controller
{
    public function indexAction()
    {
        $title = 'Categories';
        $subtitle = 'List of categories';
        $categories = (new Category)->fetchAll();
        $headers = ['ID', 'Name', 'Parent','Number of products','Created' ];
        $rows = [];
        foreach ($categories as $category) {
            $id = $category['id'];
            $name = $category['category'];
            $parent = Category::parent($id)['category'];
            $rows[] = [
                'id' => $id,
                'name' => $name,
                'parent' => $parent,
                'products' => Product::countByCategory($id),
                'created' => date('d-m-Y'),
            ];
        }
        View::renderTemplate('admin/categories.php', [
            'categories' => $categories,
            'title' => $title,
            'subtitle' => $subtitle,
            'headers' => $headers,
            'rows' => $rows,
        ]);
    }
}