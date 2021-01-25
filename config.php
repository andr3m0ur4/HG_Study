<?php

    require 'environment.php';

    $config = [];

    if (ENVIRONMENT == 'development') {
        define('BASE_URL', 'http://hg-study.com');
        $config = [
            'dbname' => 'hg-study',
            'host' => '10.0.0.103',
            'dbuser' => 'andre-moura',
            'dbpass' => 'andre'
        ];
    } else {
        define('BASE_URL', 'https://hg-study.com');
        $config = [
            'dbname' => 'estrutura_mvc',
            'host' => 'localhost',
            'dbuser' => 'andre-moura',
            'dbpass' => 'andre'
        ];
    }

    global $config;

    
