<?php

require('config.php');
require_once( ROOT . "/functions/login-functions.php");

if (isset($_POST['enter'])) {
	$userName = 'admin';
	$userPassword = '123456';

	if ( $_POST['login'] == $userName and $_POST['password'] == $userPassword ) {
		$_SESSION['user'] = 'admin';
		header('Location: ' .HOST. 'index.php');

	}
	
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');

?>