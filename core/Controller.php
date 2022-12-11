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
	
}