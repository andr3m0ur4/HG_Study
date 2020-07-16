<?php 

	namespace MF\Controller;

	use Twig\Loader\FilesystemLoader;
	use Twig\Environment;
	use Twig\Extension\DebugExtension;
	use Twig\Extra\Intl\IntlExtension;

	abstract class Action
	{
		protected $view;
		protected $loader;
		protected $view_path = '../App/Views/';
		protected $cache = '../App/Views/cache/';
		protected $twig;

		public function __construct()
		{
			$this->view = new \stdClass();

			$options = [
                'cache' => $this->cache,
                'debug' => true,
				'cache' => false,
				'dateFormat' => 'medium',
				'timeFormat' => 'medium',
				'pattern' => '',
				'timezone' => null,
				'calendar' => 'gregorian',
				'locale' => 'en'
			];
			
			$this->loader = new FilesystemLoader($this->view_path);
			$this->twig = new Environment($this->loader, $options);

			$this->twig->addExtension(new DebugExtension());
			$this->twig->addExtension(new IntlExtension());
		}

		protected function render($view, $values = [], $layout = 'layout')
		{
			$this->view->page = $view;
			$values['content'] = $this->content();

			if (file_exists($this->view_path . $layout . '.html')) {
				$template = $this->twig->load($layout . '.html');
				return $template->render($values);
			} else {
				$this->content();
			}
		}

		protected function content()
		{
			$class_atual = get_class($this);

			$class_atual = str_replace('App\\Controllers\\', '', $class_atual);

			$class_atual = strtolower(str_replace('Controller', '', $class_atual));

			//return '../App/Views/' . $class_atual . '/' . $this->view->page . '.html';
			return './' . $class_atual . '/' . $this->view->page . '.html';
		}
	}
