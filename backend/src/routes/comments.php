<?php

use Slim\Http\Request;
use Slim\Http\Response;    
use App\Models\Comment;

    $app->group('/api/v1', function() {

        $this->get('/comments/list/{id}', function(Request $request, Response $response, $args) {

            $comments = Comment::get($args['id']);
            return $response->withJson($comments);

        });
    });
