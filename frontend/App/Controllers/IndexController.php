<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;
	use App\Models\User;

	class IndexController extends Action
	{
		public function index()
		{
			$user = Container::getModel('User');
			$users = $user->get();
			echo $this->render('index', ['users' => $users]);
		}

		public function aboutus()
		{
			echo $this->render('about-us');
		}

		public function contact()
		{
			echo $this->render('contact');
		}
	}
