<?php

    require 'environment.php';

    $config = [];

    if (ENVIRONMENT == 'development') {
        define('BASE_URL', 'http://hg-study.com');
        $config = [
            'dbname' => 'hg-study',
            'host' => '10.0.0.104',
            'dbuser' => 'andre-moura',
            'dbpass' => 'andre'
        ];
    } else {
        define('BASE_URL', 'http://hg-study.gq');
        $config = [
            'dbname' => 'epiz_27810561_hg_study',
            'host' => 'sql213.epizy.com',
            'dbuser' => 'epiz_27810561',
            'dbpass' => 'JRVjbF0OL1fc9u'
        ];
    }

    global $config;
