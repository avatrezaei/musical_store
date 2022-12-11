<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\User;

class UserController extends \Core\Controller
{
    public function indexAction()
    {
        $title = 'Users';
        $subtitle = 'List of users';
        $models = (new User)->fetchAll();
        $headers = ['ID', 'FirstName', 'Lastname','Email','Mobile','Address','Created' ];
        $rows = [];
        foreach ($models as $model) {
            $id = $model['user_id'];
            $firstname = $model['first_name'];
            $lastname = $model['last_name'];
            $email = $model['email'];
            $mobile = $model['mobile']; 
            $address = $model['address1']; 
            $rows[] = [
                'id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'mobile' => $mobile,
                'address' => $address,
                'created' => date('d-m-Y'),
            ];
        }
        View::renderTemplate('admin/users.php', [
            'models' => $models,
            'title' => $title,
            'subtitle' => $subtitle,
            'headers' => $headers,
            'rows' => $rows,
        ]);
    }
}