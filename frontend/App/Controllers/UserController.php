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

		public function register()
		{
			echo $this->render('register');
		}

		public function signup()
		{
			$user = Container::getModel('User');
			
			foreach ($_POST as $attr => $value) {
				$user->__set($attr, $value);
			}

			if ($user->validateRegister() && $user->verifyEmail() == 0) {
				
				$user->__set('password', md5($_POST['password']));
				$user->save();
				echo $this->render('register', ['success' => true]);

			} else {
				echo 'erro';
			}
		}
	}
