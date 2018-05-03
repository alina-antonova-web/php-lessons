<?php

//Getting all films from DB

function films_all($link) {
	$query = "SELECT * FROM filmoteka";
	$films = array();
	if ( $result = mysqli_query($link, $query) ) {
        while ( $row = mysqli_fetch_array($result) ) {
        	$films[] = $row;
        }
    }

    return $films;
}

function get_film($link, $id) {
	$query = "SELECT * FROM filmoteka WHERE `id` = '".mysqli_real_escape_string($link, $id)."' LIMIT 1";
	if ( $result = mysqli_query($link, $query) ) {
        $film = mysqli_fetch_array($result);
    } else {
    	$film = false;
    }

    return $film;
}

function film_new($link, $title, $genre, $year, $description){

    $db_file_name = upload_image();

	$add_query = "INSERT INTO `filmoteka` (`title`, `genre`, `year`, `description`, `photo`) VALUES (  
	        '" . mysqli_real_escape_string($link, $title) . "',
	        '" . mysqli_real_escape_string($link, $genre) . "',
            '" . mysqli_real_escape_string($link, $year) . "',  
	        '" . mysqli_real_escape_string($link, $description) . "',  
            '" . mysqli_real_escape_string($link, $db_file_name) . "'
	    ) ";
    if (mysqli_query($link, $add_query) ) {
    	$resultInfo = "<div class='info-success'>Фильм успешно добавлен!</div>";
    } else {
    	$resultInfo = "<div class='error'>Произошла ошибка при добавлении фильма!</div>";
    }

    return $resultInfo;
	  
}

function update_film($link, $title, $genre, $year, $description, $id){
    
    $db_file_name = upload_image();

	$update_query = "UPDATE `filmoteka` SET 
			title = '". mysqli_real_escape_string($link, $title) . "', 
			genre = '". mysqli_real_escape_string($link, $genre) . "', 
			year = '". mysqli_real_escape_string($link, $year) . "', 
            description = '". mysqli_real_escape_string($link, $description) . "', 
            photo = '". mysqli_real_escape_string($link, $db_file_name) . "'
			WHERE `id` = ". mysqli_real_escape_string($link, $id);

    if (mysqli_query($link, $update_query) ) {
    	$resultInfo = "<div class='info-notification'>Фильм успешно отредактирован!</div>";
    } else {
    	$resultInfo = "<div class='error'>Произошла ошибка при редактировании фильма!</div>";
    }

    return $resultInfo;
	  
}

function delete_film($link, $id){
	$query = "DELETE FROM `filmoteka` WHERE `id` = '".mysqli_real_escape_string($link, $id)."' LIMIT 1";
    mysqli_query($link, $query); 

    if (mysqli_affected_rows($link) ) {
      $resultInfo = "<div  class='info-notification'>Фильм успешно удален!</div>";
    } else {
       $resultInfo = "<div  class='error'>Произошла ошибка при удалении фильма!</div>";
    }

    return $resultInfo;
	  
}

function upload_image() {
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    $errors = array();

    if ( isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "" ) {
        $fileName = $_FILES["photo"]["name"];
        $fileTmpLoc = $_FILES['photo']['tmp_name'];
        $fileType = $_FILES['photo']['type'];
        $fileSize = $_FILES['photo']['size'];
        $fileErrorMsg = $_FILES['photo']['error'];
        $kaboom = explode('.', $fileName);
        $fileExt = end($kaboom);

        list($width, $height) = getimagesize($fileTmpLoc);
        if ($width < 10 || $height < 10) {
            $errors[] = 'That image has dimensions';
        }

        $db_file_name = rand(100000000000, 999999999999) . "." . $fileExt;

        if($fileSize > 1048576) {
            $errors[] = 'Your image file was larger than 1mb';
        } else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName)) {
            $errors[] = 'Your image file was not jpg, jpeg, gif or png type';
        } else if ($fileErrorMsg == 1) {
            $errors[] = 'An unknown error occurred';
        }

        $photoFolderLocation = ROOT . 'data/films/full/';
        $photoFolderLocationMin = ROOT . 'data/films/min/';
        $photoFolderLocationFull = ROOT . 'data/films/full/';

        $uploadfile = $photoFolderLocation . $db_file_name; 
        $moveResult = move_uploaded_file($fileTmpLoc, $uploadfile);

        if ($moveResult != true) {
            $errors[] = 'File upload failed';
        }

        require_once( ROOT . "/functions/image_resize_imagick.php");
        $target_file = $photoFolderLocation . $db_file_name;
        $resized_file = $photoFolderLocationMin . $db_file_name;
        $wmax = 137;
        $hmax = 200;

        $img = createThumbnail($target_file, $wmax, $hmax);
        $img->writeImage($resized_file);


        return $db_file_name;
    }
}

?>