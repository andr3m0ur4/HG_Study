<?php 

	namespace MF\Model;

	class Container
	{
		public static function getModel($model)
		{
			// instanciar modelo
			$class = '\\App\\Models\\' . ucfirst($model);

			return new $class();
		}
	}
	