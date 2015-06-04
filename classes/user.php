<?php

/**
* Class usuario
* @author Reginaldo
* @version 0.0.1
**/

require('conexao.php');
class user extends conexao {
	private $nome;
	private $sobrenome;
	private $date;
	private $login;
	private $senha;
	private $ativo;

	/**
	* Função para criar usuario
	**/
	public function createUser() {
		$stmt = $this->conn->prepare('INSERT INTO usuario (nome,sobrenome,login,senha,ativo) 
											 	  VALUES  (:nome, :sobrenome, :login, :senha, :ativo)');
		
		$dados = array(
			'nome' 		=> $this->nome,
			'sobrenome' => $this->sobrenome,
			'login'		=> $this->login,
			'senha' 	=> $this->senha,
			'ativo'		=> $this->ativo
		);

		$stmt->execute($dados);

		return true;
	}

	/**
	* Função para editar usuario
	* @param $dados [array] com os dados nomeados de acordo com as coluna do banco;
	**/
	public function editUser() {
		return true;
	}

	/**
	* Função para visualizar usuario
	**/
	public function viewUser() {
		print_r($_GET);
		return true;
	}
	
	/**
	* Função para destatipublic o usuario
	**/
	public function deleteUser() {
		return true;
	}

	/**
	* Função que valida ser o usuario existe no banco com os dados de email e senha
	* @return Boolean true o usuario existe, false o usuario não existe (Obvio)
	**/
	public function validateUser() {
		if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
			return true;
		}

		$retorno = $this->findUserByEmailAndSenha();

		if (!empty($retorno)) {
			return true;
		}

		return false;
	}
	
	/**
	* Função para processar o login do usuario, deve ser chamada após o validateUser
	*/
	public function processLogin() {
		$retorno = $this->findUserByEmailAndSenha();

		if (!$retorno) {
			return false;
		}

		$_SESSION['usuario'] = $retorno;

		return true;
	}

	public function findUserByEmailAndSenha() {
		$stmt = $this->conn->prepare('SELECT * FROM usuario WHERE login = :login AND senha = :senha');

		$dados = array(
			'login' => $this->login,
			'senha' => $this->senha
		);

		$stmt->execute($dados);
		$retorno = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!empty($retorno)) {
			return $retorno;
		}

		return false;
	}

	/**
	* @param String $pnome
	*/
	public function setNome($pnome) {
		$this->nome = $pnome;
	}

	/**
	* @return String $nome
	*/
	public function getNome() {
		return $this->nome;
	}

	/**
	* @param String $psobrenome
	*/
	public function setSobrenome($psobrenome) {
		$this->sobrenome = $psobrenome;
	}

	/**
	* @return String $sobrenome
	*/
	public function getSobrenome() {
		return $this->sobrenome;
	}

	/**
	* @param String $pdate
	*/
	public function setDate($pdate) {
		$this->date = $pdate;
	}

	/**
	* @return String $date
	*/
	public function getDate() {
		return $this->date;
	}

	/**
	* @param String $plogin
	*/
	public function setLogin($plogin) {
		$this->login = $plogin;
	}

	/**
	* @return String $senha
	*/
	public function getLogin() {
		return $this->login;
	}

	/**
	* @param String $psenha
	*/
	public function setSenha($psenha) {
		$this->senha = $psenha;
	}

	/**
	* @return Strin $senha
	*/
	public function getSenha() {
		return $this->senha;
	}

	/**
	* @param Bollean $pativo
	*/
	public function setAtivo($pativo) {
		$this->ativo = $pativo;
	}

	/**
	* @return Bollean $ativo
	*/
	public function getAtivo() {
		return $this->ativo;
	}
}