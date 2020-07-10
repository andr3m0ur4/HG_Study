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

        $this->post('/posts/add', function(Request $request, Response $response) {

            $data = (object) $request->getParsedBody();
            $post = Post::create($data);
            return $response->withJson($post);

        });

        $this->put('/posts/update/{id}', function(Request $request, Response $response, $args) {

            $data = (object) $request->getParsedBody();
            $post = Post::find($args['id']);
            $post->update($data);
            return $response->withJson($post);

        });

        $this->delete('/posts/delete/{id}', function(Request $request, Response $response, $args) {

			$post = Post::find($args['id']);
			$post->delete();
			return $response->withJson($post);

		});
    });
