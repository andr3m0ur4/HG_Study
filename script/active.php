<?php

// Iniciar a sessão
session_start();

require_once './connectvars.php';

//Conectar-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

if (isset($_GET['user_id']) && isset($_GET['user'])) {
    $usuario = $_GET['user'];
    $query5 = "UPDATE $usuario SET active = 1 WHERE id_$usuario = " . $_GET['user_id'];
    mysqli_query($dbc, $query5)
            or die('Não foi possível ativar a conta do usuario');

    $query = "SELECT id_$usuario, email, nome FROM $usuario WHERE id_$usuario = " . $_GET['user_id'];
    $result = mysqli_query($dbc, $query)
            or die('Falha ao buscar usuário no banco de dados');

    // O login foi bem sucedido, portanto, defina a variável de sessão ID e nome do usuário,
    // e depois redirecionar para a home page
    $row = mysqli_fetch_array($result);
    $_SESSION['user_id'] = $row["id_$usuario"];
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['nome'];
    $_SESSION['usuario'] = $usuario;
    $_SESSION['id_usuario'] = "id_$usuario";
    setcookie('user_id', $row["id_$usuario"], time() + (60 * 60 * 24 * 30));    // Expira em 30 dias
    setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30));
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .
            '/../index.php';
    header('Location: ' . $home_url);
}
