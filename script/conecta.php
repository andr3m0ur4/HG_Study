<?php

include_once 'config.php';

class conecta extends config {

    var $pdo;

    function __construct() {
        $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->usuario, $this->senha);
    }

    function salvarPedido($email) {
        $stmt = $this->pdo->prepare("INSERT INTO pedidos (descricao, status) VALUES (:descricao, 1)");
        $stmt->bindValue(":descricao", $email);
        $run = $stmt->execute();
    }

    function consultarPedido($reference) {
        $stmt = $this->pdo->prepare("SELECT * FROM pedidos where descricao = :reference");
        $stmt->bindValue(":reference", $reference);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs;
    }

    function consultarUsuario($reference) {
        $usuario = 'estudante';
        $stmt = $this->pdo->prepare("SELECT * FROM estudante WHERE email = :reference");
        $stmt->bindValue(":reference", $reference);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rs == false) {
            $usuario = 'orientador';
            $stmt = $this->pdo->prepare("SELECT * FROM orientador WHERE email = :reference");
            $stmt->bindValue(":reference", $reference);
            $run = $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return array($rs, $usuario);
    }

    function atualizaPedido($reference, $status) {
        $stmt = $this->pdo->prepare("UPDATE pedidos SET status = :status where descricao = :reference");
        $stmt->bindValue(":reference", $reference);
        $stmt->bindValue(":status", $status);
        $run = $stmt->execute();
    }

    function atualizaVip($reference, $usuario) {
        $stmt = $this->pdo->prepare("UPDATE $usuario SET vip = 1 WHERE email = :reference");
        $stmt->bindValue(":reference", $reference);
        $run = $stmt->execute();
    }

    function listarPedidos() {
        $stmt = $this->pdo->prepare("SELECT p.descricao, p.id, s.status FROM pedidos as p INNER JOIN status_pedido as s on p.status = s.id order by p.id");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

    function consultarUltimoPedido() {
        $stmt = $this->pdo->prepare("SELECT * FROM pedidos order by id DESC");
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs;
    }

}

?>