<?php 

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');

if (!empty($_GET) and array_key_exists('action', $_GET) ){

  // DELETE FILM
  if ($_GET['action'] == 'delete' and $_GET['id'] != '' ){
    $resultInfo = delete_film($link, $_GET['id']);
  }
}


$films = films_all($link);

include('views/head.tpl');
include('views/index.tpl');
include('views/footer.tpl');

?>