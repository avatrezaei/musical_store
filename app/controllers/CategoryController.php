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

    // delete
    public function deleteAction()
    {
        $id = $_POST['id'];
        $category = new Category;
        $category->delete($id);
    }

    // store
    public function createAction()
    {
        // validate post fields
        $validate = $this->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);

        if (!$validate) {
            return;
        }

        $category = new Category;
        $category->category = $_POST['name'];
        $category->parent_id = $_POST['parent_id'];
        $category->save();
        
        return $this->response([
            'success' => true,
            'message' => 'Category created successfully',
        ]);
    }
}