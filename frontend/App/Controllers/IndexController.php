<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;
	use App\Models\User;
	use App\Models\Info;

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
	}
