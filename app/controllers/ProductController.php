<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\User;

class ProductController extends \Core\Controller
{
    public function indexAction()
    {
        $title = 'Products';
        $subtitle = 'List of products';
        $models = (new Product)->fetchAll();
        $headers = ['ID', 'Title', 'Category','Brand','Price','Description' ];
        $rows = [];
        foreach ($models as $model) {
            $category = Category::find($model['category'])['category'];
            $rows[] = [
                'id' => $model['id'],
                'title' => $model['title'],
                'category' => $category,
                'brand' => $model['brand'],
                'price' => $model['price'],
                'description' => $model['description'],
            ];
        }
        View::renderTemplate('admin/products.php', [
            'models' => $models,
            'title' => $title,
            'subtitle' => $subtitle,
            'headers' => $headers,
            'rows' => $rows,
        ]);
    }
}