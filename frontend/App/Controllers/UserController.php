<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;
	use App\Models\User;

	class UserController extends Action
	{
		public function users()
		{
			$user = Container::getModel('User');
			$users = $user->get();
			echo $this->render('users', ['users' => $users]);
		}
	}
