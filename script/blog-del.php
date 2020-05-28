<?php

// Iniciar a sessão
require_once './startsession.php';

require_once './connectvars.php';

// Garantir que o usuário está logado.
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Você não tem permissão para acessar esta página.');"
    . "window.location=\"../blog-home.php\";</script>";
}

//Conectar-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

if (isset($_GET['article_id'])) {
    $query5 = "DELETE FROM artigo WHERE id_artigo = " . $_GET['article_id'];
    mysqli_query($dbc, $query5)
            or die('Não foi possível excluir o artigo');
}
echo "<script>window.location=\"../blog-home.php\";</script>";
