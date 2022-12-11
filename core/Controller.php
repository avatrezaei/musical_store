<?php

namespace Core;


abstract class Controller
{
	protected $route;
     protected $view;
	protected $model;
	protected $access;

	public function __construct($route) {
		$this->route = $route;
		$this->view = new View($route);
	}

	public function __call($name, $args) {
		$method = $name . 'Action';
		if (method_exists($this, $method)) {
			if ($this->checkAccess()) {
				$this->$method();
			} else {
				View::errorCode(403);
			}
		} else {
			View::errorCode(404);
		}
	}

	public function checkAccess() {
		$this->access = require 'app/access.php';
		if ($this->isAcl('all')) {
			return true;
		} elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
			return true;
		}
		return false;
	}

	// isAcl
	public function isAcl($key) {
		return in_array($this->route['action'], $this->access[$key]);
	}

	// validate
	public function validate($data) {
		$rules = [
			'required' => [
				'pattern' => '/.+/',
				'message' => 'This field is required',
			],
			'email' => [
				'pattern' => '/^[\w.-]+@[\w.-]+\.[a-z]{2,6}$/i',
				'message' => 'This field must be a valid email address',
			],
			'integer' => [
				'pattern' => '/^[0-9]+$/',
				'message' => 'This field must be an integer',
			],
			'float' => [
				'pattern' => '/^[0-9]+[.,]?[0-9]*$/',
				'message' => 'This field must be a float',
			],
			'phone' => [
				'pattern' => '/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
				'message' => 'This field must be a phone number',
			],
			'password' => [
				'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
				'message' => 'Password must be at least 8 characters and contain at least one uppercase letter, one lowercase letter and one number',
			],
		];
		foreach ($data as $key => $value) {
			if (isset($rules[$value])) {
				if (!preg_match($rules[$value]['pattern'], $_POST[$key])) {
					$this->view->message('error', $rules[$value]['message']);
					return false;
				}
			}
		}

		return true;
		
	}



	// response
	public function response($data) {
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
	
}