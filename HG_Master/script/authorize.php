<?php

// Nome do usuário e senha para autenticação
if (isset($_GET['user']) && isset($_GET['password'])) {
    $username = $_GET['user'];
    $password = $_GET['password'];
} else {
    $username = 'admin';
    $password = '46_5tud4';
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    //Nome do usuário/senha incorretos, então enviar os cabeçalhos de autenticação
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="HG Study"');
    exit('<h2>HG Study</h2>Desculpe, você deve digitar um nome de usuário e senha ' .
            'válidos para acessar esta página.');
}
?>