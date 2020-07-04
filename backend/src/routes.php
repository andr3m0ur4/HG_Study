<?php

    use Slim\Http\Request;
    use Slim\Http\Response;

    // Routes

    $app->get('/', function(Request $request, Response $response) {

        $text = 'Olá mundo!!';
        return $response->withJson($text);

    });

    // Catch-all route to serve a 404 Not Found page if none of the routes match
	// NOTE: make sure this route is defined last
	$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
	    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
	    return $handler($req, $res);
	});
