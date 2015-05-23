<?php

/**
* Class usuario
* @author Reginaldo
* @version 0.0.1
**/

require('conexao.php');
class user extends conexao {
	public $nome;
	public $sobrenome;
	public $date;
	public $login;
	public $senha;
	public $ativo;

	/**
	* Função para criar usuario
	* @param $dados [array] com os dados nomeados de acordo com as coluna do banco;
	**/
	public function createUser() {
		echo 'create user';
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
}