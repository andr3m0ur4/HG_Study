<?php
// Variável de conexão com o banco de dados.
$con = mysqli_connect("localhost", "root", "", "hg_study")
        or die("Conexão não foi estabelecida");
mysqli_set_charset($con, 'utf8');
?>