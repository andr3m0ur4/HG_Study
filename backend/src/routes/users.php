<?php

use Slim\Http\Request;
use Slim\Http\Response;    
use App\Models\User;

    $app->group('/api/v1', function() {

        $this->get('/users/list', function(Request $request, Response $response) {

            $users = User::get();
            return $response->withJson($users);

        });

        $this->get('/users/leader/list', function(Request $request, Response $response) {

            $leaders = User::getLeaders();
            return $response->withJson($leaders);
            
        });

        $this->get('/users/list/{id}', function(Request $request, Response $response, $args) {

            $user = User::find($args['id']);
            return $response->withJson($user);

        });
    });
