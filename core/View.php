<?php

namespace Core;

use App\Models\Category;


class View
{

     public $path;
	public $route;
	public $layout = 'default';
	public $categories = [];

	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'] . '/' . $route['action'];
	}

    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/app/views/$view";   

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }


    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/app/views');
		  $categories = (new Category)->where(['parent_id'=>0])->fetchAll();
		  foreach($categories as $key=>$category) {
			$categories[$key]['children'] = Category::children($category['id']);
		  }
            $twig = new \Twig\Environment($loader);
		  $twig->addGlobal('session', $_SESSION);
		  $twig->addGlobal('cats', $categories);
        }

        echo $twig->render($template, $args);
    }

	public static function errorCode($code, $message = '') {
		http_response_code($code);
		$path = dirname(__DIR__) .'/app/views/errors/' . $code . '.php';
		if (file_exists($path)) {
			if (DEBUG_MODE !== 1) { 
				$message = '';
			}
			require $path;
		} else {
			echo "view $path not found";
		}
		exit();
	}

	public function redirect($url) {
		header('location:' . $url);
		exit();
	}

	public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

	public function location($url) {
		exit(json_encode(['url' => $url]));
	}

}