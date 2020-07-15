<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;
	use App\Models\User;

	class BlogController extends Action
	{
		public function bloghome()
		{
			//$user = Container::getModel('User');
			//$users = $user->get();
			echo $this->render('blog-home');
		}
	}
