<?php

    global $routes;
    $routes = [
        '/single/update' => '/single/update',
        '/single/{id}' => '/single/index/:id',
        //'/galeria/{id}/{titulo}' => '/galeria/abrir/:id/:titulo',
        '/blog-single/{id}' => '/blog-single/index/:id',
        '/home' => '/home/index',
        //'/{titulo}' => '/noticia/abrirTitulo/:titulo'
        '/logout' => '/login/logout'
    ];
