<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;
	use App\Models\Post;

	class BlogController extends Action
	{
		public function bloghome()
		{
			$post = Container::getModel('Post');
			$posts = $post->get();
			echo $this->render('blog-home', ['posts' => $posts]);
		}
	}
