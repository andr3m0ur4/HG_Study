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

        $this->post('/users/add', function(Request $request, Response $response) {

            $data = (object) $request->getParsedBody();
            $user = User::create($data);
            return $response->withJson($user);

        });

        $this->put('/users/update/{id}', function(Request $request, Response $response, $args) {

            $data = (object) $request->getParsedBody();
            $user = User::find($args['id']);
            $user->update($data);
            return $response->withJson($user);

        });

        $this->post('/users/verifyemail', function(Request $request, Response $response) {

            $data = (object) $request->getParsedBody();
            $count = User::verifyEmail($data->email);
            return $response->withJson($count);

        });

        // Experiências, Projetos e Certificados

        $this->get('/users/experiences/{id}', function(Request $request, Response $response, $args) {

            $experiences = User::getExperiences($args['id']);
            return $response->withJson($experiences);

        });

        $this->post('/users/experience/add', function(Request $request, Response $response) {

            $data = (object) $request->getParsedBody();
            $experience = User::setExperience($data);
            return $response->withJson($experience);

        });

        $this->put('/users/experience/update/{id}', function(Request $request, Response $response, $args) {

            $data = (object) $request->getParsedBody();
            $experience = User::setExperience($data, $args['id']);
            return $response->withJson($experience);
            
        });

        $this->delete('/users/experience/delete/{id}', function(Request $request, Response $response, $args) {

            $experience = User::deleteExperience($args['id']);
            return $response->withJson($experience);
            
        });

        $this->get('/users/certificates/{id}', function(Request $request, Response $response, $args) {

            $certificates = User::getCertificates($args['id']);
            return $response->withJson($certificates);

        });

        $this->post('/users/certificate/add', function(Request $request, Response $response) {

            $data = (object) $request->getParsedBody();
            $certificate = User::setCertificate($data);
            return $response->withJson($certificate);

        });

        $this->put('/users/certificate/update/{id}', function(Request $request, Response $response, $args) {

            $data = (object) $request->getParsedBody();
            $certificate = User::setCertificate($data, $args['id']);
            return $response->withJson($certificate);
            
        });

        $this->delete('/users/certificate/delete/{id}', function(Request $request, Response $response, $args) {

            $certificate = User::deleteCertificate($args['id']);
            return $response->withJson($certificate);
            
        });

        $this->get('/users/projects/{id}', function(Request $request, Response $response, $args) {

            $projects = User::getProjects($args['id']);
            return $response->withJson($projects);

        });

        $this->post('/users/project/add', function(Request $request, Response $response) {

            $data = (object) $request->getParsedBody();
            $project = User::setProject($data);
            return $response->withJson($project);

        });

        $this->put('/users/project/update/{id}', function(Request $request, Response $response, $args) {

            $data = (object) $request->getParsedBody();
            $project = User::setProject($data, $args['id']);
            return $response->withJson($project);
            
        });

        $this->delete('/users/project/delete/{id}', function(Request $request, Response $response, $args) {

            $project = User::deleteProject($args['id']);
            return $response->withJson($project);
            
        });
    });
