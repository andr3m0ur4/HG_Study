<?php 

	namespace MF\Model;

	use App\Connection;

	class Container
	{
		public static function getModel($model)
		{
			// instância de conexão
			$conn = Connection::getDb();

			// instanciar modelo
			$class = '\\App\\Models\\' . ucfirst($model);

			return new $class($conn);
		}
	}
	