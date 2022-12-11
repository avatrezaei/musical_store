<?php

namespace Core;


class Router
{

    protected $routes = [];
	protected $params = [];
	
	public function __construct()
	{
		$routes = require dirname(__DIR__) . '/routes.php';
		foreach ($routes as $key => $val) {
			$this->add($key, $val);
		}
	}

	public function add($route, $params) {
		$route = '#^' . $route . '$#';
		$this->routes[$route] = $params;
	}

	public function match() {
		$url = parse_url($_SERVER['QUERY_STRING']);
		// if $url string has "route=" in it then remove it
		if (strpos($url['path'], 'route=') !== false) {
			$url['path'] = '/'.str_replace('route=', '', $url['path']);
		}
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url['path'], $matches)) {
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function run() {
		if ($this->match()) {
			$path = 'App\Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
			if (class_exists($path)) {
				$action = $this->params['action'] . 'Action';
				if (method_exists($path, $action)) {
					$controller = new $path($this->params);
					$controller->$action();
				} else {
					View::errorCode(404,"action $action not found");
				}
			} else {
				View::errorCode(404,"controller $path not found");
			}
		} else {
			View::errorCode(404,"route not found");
		}
	}
}