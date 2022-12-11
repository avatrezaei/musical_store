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

    // delete
    public function deleteAction()
    {
        $id = $_POST['id'];
        $category = new Brand;
        $category->delete($id);
    }

    // store
    public function createAction()
    {
        // validate post fields
        $validate = $this->validate([
            'name' => 'required'
        ]);

        if (!$validate) {
            return;
        }

        $brand = new Brand;
        $brand->brand_title = $_POST['name'];
        $brand->save();
        
        return $this->response([
            'success' => true,
            'message' => 'Brand created successfully',
        ]);
    }
}