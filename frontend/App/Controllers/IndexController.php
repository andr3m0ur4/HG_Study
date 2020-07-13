<?php 

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;
	use App\Models\Produto;
	use App\Models\Info;

	class IndexController extends Action
	{
		public function index()
		{
			$this->render('index');
		}
	}
