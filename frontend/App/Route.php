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

			$this->setRoutes($routes);
		}
	}
