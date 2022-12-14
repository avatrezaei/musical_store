<?php
	
return [
	'/home' => [
		'controller' => 'home',
		'action' => 'index'
	],
	'/admin/dashboard' => [
		'controller' => 'dashboard',
		'action' => 'index'
	],
	'/admin/categories' => [
		'controller' => 'category',
		'action' => 'index'
	],
	'/admin/categories/delete' => [
		'controller' => 'category',
		'action' => 'delete'
	],
	'/admin/categories/create' => [
		'controller' => 'category',
		'action' => 'create'
	],
	'/admin/brands' => [
		'controller' => 'brand',
		'action' => 'index'
	],
	'/admin/brands/delete' => [
		'controller' => 'brand',
		'action' => 'delete'
	],
	'/admin/brands/create' => [
		'controller' => 'brand',
		'action' => 'create'
	],
	'/admin/users' => [
		'controller' => 'user',
		'action' => 'index'
	],
	'/admin/products' => [
		'controller' => 'product',
		'action' => 'index'
	],
	'/admin/products/delete' => [
		'controller' => 'product',
		'action' => 'delete'
	],
	'/admin/products/create' => [
		'controller' => 'product',
		'action' => 'create'
	],
	'/admin/login' => [
		'controller' => 'admin',
		'action' => 'login'
	],
	'/admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout'
	],
	'/home' => [
		'controller' => 'home',
		'action' => 'index'
	],
];