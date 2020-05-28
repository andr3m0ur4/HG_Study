<?php

include_once 'conecta.php';
$conn = new conecta();

$email = htmlentities($_POST["email"]);

$conn->salvarPedido($email);

$pedido = $conn->consultarUltimoPedido();

echo $pedido["descricao"];

?>