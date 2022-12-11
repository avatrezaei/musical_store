<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Brand;
use \App\Models\Product;
use \App\Models\User;

class BrandController extends \Core\Controller
{
    public function indexAction()
    {
        $title = 'Brands';
        $subtitle = 'List of brands';
        $models = (new Brand)->fetchAll();
        $headers = ['ID', 'Title', 'Number of products','Created' ];
        $rows = [];
        foreach ($models as $model) {
            $id = $model['brand_id'];
            $name = $model['brand_title'];
            $rows[] = [
                'id' => $id,
                'title' => $name,
                'products' => Brand::countByCategory($id),
                'created' => date('d-m-Y'),
            ];
        }
        View::renderTemplate('admin/brands.php', [
            'models' => $models,
            'title' => $title,
            'subtitle' => $subtitle,
            'headers' => $headers,
            'rows' => $rows,
        ]);
    }
}