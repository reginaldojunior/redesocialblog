<?php

/**
* Class usuario
* @author Reginaldo
* @version 0.0.1
**/

require('conexao.php');
class user extends conexao {

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
	* Função para destativar o usuario
	**/
	public function deleteUser() {
		return true;
	}
}