<?php 

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/film-single.tpl');	
include('views/footer.tpl');

?>