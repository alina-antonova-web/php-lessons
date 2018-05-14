<?php 
require('config.php');
require_once( ROOT . "/functions/login-functions.php");
require('database.php');
$link = db_connect();

require('models/films.php');

if (!empty($_POST) and array_key_exists('update_film', $_POST) ){
	$errors = array();
  if ($_POST['title'] == '') {
      $errors[] = "<div class='error'>Название фильма не может быть пустым.</div>";
    } 
    if ($_POST['genre'] == '') {
      $errors[] = "<div class='error'>Жанр фильма не может быть пустым.</div>";
    } 
    if ($_POST['year'] == '') {
      $errors[] = "<div class='error'>Год фильма не может быть пустым.</div>";
    } 
  if ( empty($errors) ) {
    $resultInfo = update_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $_POST['id']);
  }
	$_GET['id'] = $_POST['id'];  
}

//Select film
$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>