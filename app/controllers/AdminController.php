<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\Admin;

class AdminController extends \Core\Controller
{
    protected $access = [
		'all' => [
			'login'
		],
		'authorize' => [
		],
		'guest' => [
		],
		'admin' => [
			'logout',
		],
	];

    public function loginAction() {
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('/musical_store/admin/dashboard');
		}

		$error = '';
		 
		if (!empty($_POST)) {
			$username = cleanInput($_POST['username']);
    			$password = cleanInput($_POST['password']);	

			if ($username === '') {
				$error = 'username is empty';
			 } else {
				$model = new Admin();

				$admin = $model->where(['name'=> $username])->fetch();
		  
				if ($admin && $admin !== null && password_verify($password, $admin['password']) === true) {
				    $_SESSION['admin'] = $admin;
				    header('Location: dashboard');
				} else {
				    $error = 'Username or password is incorrect';
				}
			 }	
		}
		$this->view->renderTemplate('admin/login.php',['error'=>$error]);
	}

	public function logoutAction() {
		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
			$this->view->redirect('login');
		} else {
			View::errorCode(404);
		}
	}
}