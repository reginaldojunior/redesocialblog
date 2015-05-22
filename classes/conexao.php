<?php
require('configs/config.php');

class conexao {
	public $conn = '';

	/*
	* Função __construct que vai iniciar a conexão sempre que for instanciada, via pdo
	*/
	function __construct () {
		try {
		    $this->conn = new PDO('mysql:host='.HOST.';dbname='.DB.'', USER, PASSWD);
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}
	}
}