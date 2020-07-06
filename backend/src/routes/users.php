<?php

use Slim\Http\Request;
use Slim\Http\Response;    
use App\Models\User;

    $app->group('/api/v1', function() {

        $this->get('/users/list', function(Request $request, Response $response) {

            $users = User::get();
            return $response->withJson($users);
        });
    });
