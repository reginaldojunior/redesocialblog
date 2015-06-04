<?php
session_start();

require('helpers/libs/Smarty.class.php');
$smarty = new Smarty();

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$router = $url[1];

switch ($router) {
	case 'profile':
		require('classes/user.php');
		$user = new user();

		if (!$user->validateUser()) {
			$_SESSION['alerts'][0]['msg']  = 'Você não tem acesso a esta area da rede';
			$_SESSION['alerts'][0]['tipo'] = 'warning';

			header('Location: /');
			exit();
		}

		echo 'paramos aqui';
		exit();
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
			$_SESSION['alerts'][0]['msg']  = 'Usuario criado com sucesso';
			$_SESSION['alerts'][0]['tipo'] = 'success';

			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			$_SESSION['alerts'][0]['msg']  = 'Ocorreu algum erro ao criar usuario';
			$_SESSION['alerts'][0]['tipo'] = 'warning';

			header('Location: ' . $_SERVER['HTTP_REFERER'] . '/profile');
		}
	break;

	case 'login':
		if (!isset($_POST['login']) && empty($_POST['login'])) {
			$_SESSION['alerts'][0]['msg']  = 'Você não tem acesse a este pagina';
			$_SESSION['alerts'][0]['tipo'] = 'warning';
		}
		
		require('classes/user.php');
		$user = new user();

		$usuario = $_POST['login'];

		$user->setLogin($usuario['login']);
		$user->setSenha($usuario['senha']);

		if ($user->validateUser()) {
			$user->processLogin();

			$_SESSION['alerts'][0]['msg']  = 'Logado com sucesso';
			$_SESSION['alerts'][0]['tipo'] = 'success';

			header('Location: /profile');
		} else {
			$_SESSION['alerts'][0]['msg']  = 'Os dados estão incorretos';
			$_SESSION['alerts'][0]['tipo'] = 'warning';

			header('Location: /');;
		}

	break;

	default:
		if (isset($_SESSION['alerts']) && !empty($_SESSION['alerts'])) {
			$alerts = $_SESSION['alerts'];
			unset($_SESSION['alerts']);

			$smarty->assign('alerts', $alerts);
		}

		$smarty->display('container/header.html');

		$smarty->display('home/home.html');	

		$smarty->display('container/footer.html');
	break;
}