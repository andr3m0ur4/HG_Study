<?php 

	namespace App;

	use MF\Init\Bootstrap;

	class Route extends Bootstrap
	{
		protected function initRoutes()
		{
			$routes['home'] = [
				'route' => '/',
				'controller' => 'IndexController',
				'action' => 'index'
			];

			$routes['about-us'] = [
				'route' => '/about-us',
				'controller' => 'IndexController',
				'action' => 'aboutus'
			];

			$routes['users'] = [
				'route' => '/users',
				'controller' => 'UserController',
				'action' => 'users'
			];

			$routes['blog-home'] = [
				'route' => '/blog-home',
				'controller' => 'BlogController',
				'action' => 'bloghome'
			];

			$routes['blog-single'] = [
				'route' => '/blog-single',
				'controller' => 'BlogController',
				'action' => 'blogsingle'
			];

			$routes['contact'] = [
				'route' => '/contact',
				'controller' => 'IndexController',
				'action' => 'contact'
			];

			$routes['single'] = [
				'route' => '/single',
				'controller' => 'UserController',
				'action' => 'single'
			];

			$routes['register'] = [
				'route' => '/register',
				'controller' => 'UserController',
				'action' => 'register'
			];

			$routes['signup'] = [
				'route' => '/signup',
				'controller' => 'UserController',
				'action' => 'signup'
			];

			$this->setRoutes($routes);
		}
	}
