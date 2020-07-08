<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Post;

    $app->group('/api/v1', function() {

        $this->get('/posts/list', function(Request $request, Response $response) {

            $posts = Post::get();
            return $response->withJson($posts);

        });

        $this->get('/posts/list/{id}', function(Request $request, Response $response, $args) {

            $post = Post::find($args['id']);
            return $response->withJson($post);

        });
    });
