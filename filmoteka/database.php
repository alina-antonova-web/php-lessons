<?php

function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
	
	if ( mysqli_connect_error() ) {
	  die("Ошибка подключения к базе данных.");
	}

	mysqli_select_db($link, 'test_db');

	if( !mysqli_set_charset($link, 'utf8') ) {
		printf("Error: " . masqli_error($link));
	}

	return $link;
}

?>