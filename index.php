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
	default:
		echo 'default';
	break;
}