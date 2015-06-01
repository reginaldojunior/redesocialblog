<?php

require('helpers/libs/Smarty.class.php');
$smarty = new Smarty();

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$router = $url[1];

switch ($router) {
	case 'profile':
		require('classes/user.php');
		$user = new user();

		$user->viewUser();

		$smarty->display('profile/index.html');
	break;

	case 'create':
		require('classes/user.php');
		$user = new user();
		$usuario = $_POST['cadastro'];

		$user->setNome($usuario['nome']);
		$user->setSobrenome($usuario['sobrenome']);
		$user->setLogin($usuario['login']);
		$user->setSenha($usuario['senha']);
		$user->setAtivo(1);

		if ($user->createUser()) {
			echo 'sucesso';
		} else {
			echo 'erro';
		}
	break;

	default:
		$smarty->display('container/header.html');

		$smarty->display('home/home.html');

		$smarty->display('container/footer.html');
	break;
}