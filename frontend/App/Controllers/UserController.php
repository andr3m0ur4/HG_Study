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

		public function single()
		{
			$id = $_GET['id'];

			$user = Container::getModel('User');

			$values = [
				'user' => $user->find($id),
				'experiences' => $user->getExperiences($id),
				'projects' => $user->getProjects($id),
				'certificates' => $user->getCertificates($id)
			];

			echo $this->render('single', $values);
		}
	}
