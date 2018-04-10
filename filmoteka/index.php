<?php 
$link = mysqli_connect('localhost', 'test_db', '123qwe', 'test_db');
mysqli_select_db($link, 'test_db');
mysqli_set_charset($link, 'utf8');

if ( mysqli_connect_error() ) {
  die("Ошибка подключения к базе данных.");
}


if (!empty($_GET) and array_key_exists('action', $_GET) ){
  // echo "<pre>";
  // print_r($_GET);
  // echo "</pre>";

  // DELETE FILM
  if ($_GET['action'] == 'delete'){
    $delete_query = "DELETE FROM `filmoteka` WHERE `id` = '".mysqli_real_escape_string($link, $_GET['id'])."' LIMIT 1";
    mysqli_query($link, $delete_query);
    if (mysqli_affected_rows($link) ) {
      $resultInfo = "<div  class='info-notification'>Фильм успешно удален!</div>";
    } 
    // else {
    //   $resultInfo = "<div  class='error'>Произошла ошибка при удалении фильма!</div>";
    // }
  }
}

if (!empty($_POST) and array_key_exists('add_film', $_POST) ){
  if ($_POST['title'] == '') {
    $formError = "<div class='error'>Название фильма не может быть пустым.</div>";
  } else if ($_POST['genre'] == '') {
    $formError = "<div class='error'>Жанр фильма не может быть пустым.</div>";
  } else if ($_POST['year'] == '') {
    $formError = "<div class='error'>Год фильма не может быть пустым.</div>";
  } else {
    $add_query = "INSERT INTO `filmoteka` (`title`, `genre`, `year`) VALUES (  
        '" . mysqli_real_escape_string($link, $_POST['title']) . "',
        '" . mysqli_real_escape_string($link, $_POST['genre']) . "',
        '" . mysqli_real_escape_string($link, $_POST['year']) . "' 
      ) ";

    if (mysqli_query($link, $add_query) ) {
      $resultInfo = "<div class='info-success'>Фильм успешно добавлен!</div>";
    } else {
      $resultInfo = "<div class='error'>Произошла ошибка при добавлении фильма!</div>";
    }
  }
  
}



?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8"/>
    <title>UI-kit и HTML фреймворк - Документация</title>
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/><!-- build:cssVendor css/vendor.css -->
    <link rel="stylesheet" href="libs/normalize-css/normalize.css"/>
    <link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css"/>
    <link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css"/><!-- endbuild -->
<!-- build:cssCustom css/main.css -->
    <link rel="stylesheet" href="css/main.css"/><!-- endbuild -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="container user-content pt-35">
      <h1 class="title-1"> Фильмотека</h1>
      <?php 

          if (@$resultInfo != '') {
            echo $resultInfo;
          }

          $query = "SELECT * FROM filmoteka";

          if ( $result = mysqli_query($link, $query) ) {
            while ( $row = mysqli_fetch_array($result) ) {

              echo "<div class='card mb-20'>
                      <div class='card__header'>
                        <h4 class='title-4'>". $row['title'] ."</h4>
                        <div class='buttons'>
                          <a href='edit.php?id=". $row['id'] ."' class='button button--edit'>Редактировать</a>
                          <a href='?action=delete&id=". $row['id'] ."' class='button button--delete'>Удалить</a>
                        </div>
                      </div>
                      <div class='badge'>". $row['genre'] ."</div>
                      <div class='badge'>". $row['year'] ."</div>
                    </div>";
            }
          }
      ?>
      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        <?php if (@$formError != '' ) { echo $formError; } ?>
        <form action="index.php" method="POST">
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" placeholder="Такси 2" name="title"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="комедия" name="genre"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="2000" name="year"/>
            </div>
          </div>
          <input class="button" type="submit" name="add_film" value="Добавить" style="padding-top: 0;">
        </form>
      </div>
    </div><!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>