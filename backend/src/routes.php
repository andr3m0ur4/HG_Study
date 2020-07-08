<?php

    use Lib\Model\Model;
    use Lib\Model\Error;

    if (get_class($container->get('db')) == 'PDO') {

        Model::setDb($container->get('db'));

    } else {
        echo Error::getError($container->get('db'));
        die();
    }

    // Routes
    require __DIR__ . '/routes/users.php';
    require __DIR__ . '/routes/posts.php';
    require __DIR__ . '/routes/comments.php';
    
    // Catch-all route to serve a 404 Not Found page if none of the routes match
	// NOTE: make sure this route is defined last
	$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
	    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
	    return $handler($req, $res);
	});
