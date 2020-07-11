<?php

    // Application middleware

	// e.g: $app->add(new \Slim\Csrf\Guard);
	$app->add(new Tuupola\Middleware\JwtAuthentication([
	    "header" => "X-Token",
	    "regexp" => "/(.*)/",
		"path" => "/api", /* or ["/api", "/admin"] */
		"relaxed" => ["localhost", "10.0.0.104"],
	    "ignore" => [
			"/api/token",
			"/api/v1/users/list",
			"/api/v1/users/leader/list",
			"/api/v1/posts/list",
			"/api/v1/users/add",
			"/api/v1/comments/list",
			"/api/v1/users/experiences",
			"/api/v1/users/projects",
			"/api/v1/users/certificates"
		],
	    "secret" => $container->get('settings')['secretKey']
	]));

    $app->add(function ($req, $res, $next) {
	    $response = $next($req, $res);
	    return $response
	            ->withHeader('Access-Control-Allow-Origin', '*')
	            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
	            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
	});
