<?php

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$router = $url[1];

switch ($router) {
	case 'profile':
		require('classes/user.php');
		$user = new user();

		$user->viewUser();
	break;

	case 'create_profile':
		require('classes/user.php');
		$user = new user();

		$user->createUser();
	break;
	
	default:
		echo 'default';
	break;
}