<?php 
$link = mysqli_connect('localhost', 'test_db', '123qwe', 'test_db');
mysqli_select_db($link, 'test_db');
mysqli_set_charset($link, 'utf8');

if ( mysqli_connect_error() ) {
  die("Ошибка подключения к базе данных.");
}

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

if (!empty($_GET) and array_key_exists('action', $_GET) ){

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

if (!empty($_POST) and array_key_exists('update_film', $_POST) ){
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";

	if ($_POST['title'] == '') {
	    $formError = "<div class='error'>Название фильма не может быть пустым.</div>";
	} else if ($_POST['genre'] == '') {
	    $formError = "<div class='error'>Жанр фильма не может быть пустым.</div>";
	} else if ($_POST['year'] == '') {
	    $formError = "<div class='error'>Год фильма не может быть пустым.</div>";
	} else {
	    $add_query = "UPDATE `filmoteka` SET title = '". mysqli_real_escape_string($link, $_POST['title']) . "', genre = '" . mysqli_real_escape_string($link, $_POST['genre']) . "', year = '" . mysqli_real_escape_string($link, $_POST['year']) . "' WHERE `id` = " . mysqli_real_escape_string($link, $_POST['id']);

	    if (mysqli_query($link, $add_query) ) {
	      $resultInfo = "<div class='info-notification'>Фильм успешно отредактирован!</div>";
	    } else {
	      $resultInfo = "<div class='error'>Произошла ошибка при редактировании фильма!</div>";
	    }
	}
	$_GET['id'] = $_POST['id'];
  
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
    	<div class="panel-holder mt-0 mb-40">
    		<div class="title-4 mt-0">Редактировать фильм</div>
    		<?php if (@$formError != '' ) { echo $formError; } ?>
    		<form action="edit.php" method="POST">
      
	      <?php 

	          if (@$resultInfo != '') {
	            echo $resultInfo;
	          }

	          $query = "SELECT * FROM filmoteka WHERE `id` = '".mysqli_real_escape_string($link, $_GET['id'])."'";

	          if ( $result = mysqli_query($link, $query) ) {
	            while ( $row = mysqli_fetch_array($result) ) {

              
                echo '                	
                	<label class="label-title">Название фильма</label>
			          <input type="hidden" name="id" value="'.$row['id'].'"/>
			          <input class="input" type="text" placeholder="Такси 2" name="title" value="'.$row['title'].'"/>
			          <div class="row">
			            <div class="col">
			              <label class="label-title">Жанр</label>
			              <input class="input" type="text" placeholder="комедия" name="genre" value="'.$row['genre'].'"/>
			            </div>
			            <div class="col">
			              <label class="label-title">Год</label>
			              <input class="input" type="text" placeholder="2000" name="year" value="'.$row['year'].'"/>
			            </div>
			          </div>
			          <div class="card__header">
                          <input class="button" type="submit" name="update_film" value="Сохранить" style="padding-top: 0;">
                          <a href="?action=delete&id='. $row['id'] .'" class="button button--delete">Удалить</a>
                      </div>
			          ';
            }
          }
      ?>
	      		
	        </form>

     	</div>
     	<div class="mb-100">
	        <a href="index.php" class="button">Вернуться на главную</a>
	    </div>
    </div>
    <!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>