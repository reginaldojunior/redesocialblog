<?php

include('classes/conexao.php');

$objConexao = new conexao();
$stmt = $objConexao->conn->prepare('SELECT * FROM tbl_teste');
$stmt->execute();

$retorno = $stmt->fetch();

print_r($retorno);