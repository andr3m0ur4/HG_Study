<?php
// Se o usuário estiver logado, apagar as variáveis de sessão para fazer o logout
session_start();

if (isset($_SESSION['user_id'])){
    // Apaga as variáveis de sessão limpando o array $_SESSION.
    $_SESSION = array();
    
    // Apaga o cookie de sessão, definindo os seu prazo de validade como uma hora atrás (3600)
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time() - 3600);
    }
    
    // Destrói a sessão
    session_destroy();
}
// Apaga os cookies de ID e de nome de usuário, definindo os seus prazos de validade como uma 
// hora atrás (3600)
setcookie('user_id', '', time() - 3600);
setcookie('email', '', time() - 3600);

// Redireciona para a home page
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . 
        '/HG_Study/index.php';
header('Location: ' . $home_url);
?>