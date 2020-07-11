<?php

use Slim\Http\Request;
use Slim\Http\Response;    
use App\Models\Comment;

    $app->group('/api/v1', function() {

        $this->get('/comments/list/{id}', function(Request $request, Response $response, $args) {

            $comments = [];

            foreach (Comment::get($args['id']) as $comment) {
                $comment->__set('comments', $comment->getComments());
                array_push($comments, $comment);
            }

            return $response->withJson($comments);

        });

        $this->post('/comments/add', function(Request $request, Response $response) {

            $data = (object) $request->getParsedBody();
            $comment = Comment::create($data);
            return $response->withJson($comment);

        });

        $this->put('/comments/update/{id}', function(Request $request, Response $response, $args) {

            $data = (object) $request->getParsedBody();
            $comment = Comment::find($args['id']);
            $comment->update($data);
            return $response->withJson($comment);

        });

        $this->delete('/comments/delete/{id}', function(Request $request, Response $response, $args) {

			$comment = Comment::find($args['id']);
			$comment->delete();
			return $response->withJson($comment);

        });
    });
