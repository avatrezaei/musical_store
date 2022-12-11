<?php
namespace App\Models;

use Core\Model;

class Admin extends Model
{
     protected $id;
     protected $name;
     protected $email;
     protected $password;

	public function __construct() {
		$this->table = 'admin';
	}

     public function checkAdmin() {

		$login = isset($_POST['login']) ? htmlspecialchars($_POST['login']) : '';
		$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

		if (empty($login)) {
			return [
				'status' => self::ERROR,
				'message' => "error : user name is empty"
			];
		}

		if (empty($password)) {
			return [
				'status' => self::ERROR,
				'message' => 'password is empty'
			];
		}

          // find admin in db
          $admin = $this->find(['login' => $login]);

		if (trim($login) == 'admin' && trim($password) == '123') {
			$_SESSION['login'] = "admin";
			return [
				'url' => '/'
			];
		}

		return [
			'status' => self::ERROR,
			'message' => 'Неправильная пара логин-пароль'
		];
	}

}