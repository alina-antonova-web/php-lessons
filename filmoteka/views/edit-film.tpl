<div class="panel-holder mt-0 mb-40">
	<div class="title-4 mt-0">Редактировать фильм</div>
	<?php 
	    if ( !empty($errors) ) {
	      foreach ($errors as $key => $error) {
	        echo $error;
	      }
	    }

	    if ($_GET['id'] != '') {  
  	?>
	<form action="edit.php" method="POST" enctype="multipart/form-data">               	
    	<label class="label-title">Название фильма</label>
        <input type="hidden" name="id" value="<?php echo $film['id']; ?>"/>
        <input class="input" type="text" placeholder="Такси 2" name="title" value="<?=$film['title']?>"/>
      	<div class="row">
        	<div class="col">
          		<label class="label-title">Жанр</label>
          		<input class="input" type="text" placeholder="комедия" name="genre" value="<?=$film['genre']?>"/>
        	</div>
	        <div class="col">
	          	<label class="label-title">Год</label>
	          	<input class="input" type="text" placeholder="2000" name="year" value="<?=$film['year']?>"/>
	        </div>
      	</div>
      	<textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"> <?=$film['description']?> </textarea>
      	<div class="row mb-20">
	  	  	<div class="col-auto">
	  		  	<img height="200" src="<?=HOST?>data/films/min/<?=$film['photo']?>" alt="<?=$film['title']?>">
	  		</div>
	  		<div class="col">
	  			<input type="file" name="photo"/>
	  		</div>
	  	</div>
      	
        <div class="card__header">
            <input class="button" type="submit" name="update_film" value="Сохранить" style="padding-top: 0;">
            <a href="index.php?action=delete&id=<?php echo $film['id']; ?>" class="button button--delete">Удалить</a>
        </div>
	</form>
	<?php
		} else {
			echo "<div class='info-notification'>Выберите следующий фильм на <a href='index.php'>главной странице</a>!</div>";
		}
	?>
</div>