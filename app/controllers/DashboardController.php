<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\User;

class DashboardController extends \Core\Controller
{
    public function indexAction()
    {        
        $users = (new User)->count();
        $product = (new Product)->count();
        $category = (new Category)->count();
        $username = $_SESSION['admin']['name'];
        View::renderTemplate('admin/dashboard.php', [
            'users' => $users,
            'products' => $product,
            'categories' => $category,
            'username' => $username
        ]);
    }
}