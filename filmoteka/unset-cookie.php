<?php
require('config.php');

if (isset($_POST['user-unset'])) {
	$expire = time() - 60;
	setcookie('user-name', '', $expire);
	setcookie('user-city', '', $expire);
}

header('Location: ' .HOST. 'request.php')
?>