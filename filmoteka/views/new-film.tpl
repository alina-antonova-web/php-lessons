<div class="panel-holder mt-20 mb-40">    
  <div class="title-4 mt-0">Добавить фильм</div>
  <?php 
    if ( !empty($errors) ) {
      foreach ($errors as $key => $error) {
        echo $error;
      }
    }  
  ?>
  <form action="new.php" method="POST"  enctype="multipart/form-data">
    <label class="label-title">Название фильма</label>
    <input class="input" type="text" placeholder="Такси 2" name="title" <?php if (@$_POST['title'] != '') { echo "value = '" .$_POST['title']. "'"; } ?> />
    <div class="row">
      <div class="col">
        <label class="label-title">Жанр</label>
        <input class="input" type="text" placeholder="комедия" name="genre" <?php if (@$_POST['genre'] != '') { echo "value = '" .$_POST['genre']. "'"; } ?> />
      </div>
      <div class="col">
        <label class="label-title">Год</label>
        <input class="input" type="text" placeholder="2000" name="year" <?php if (@$_POST['year'] != '') { echo "value = '" .$_POST['year']. "'"; } ?> />
      </div>
    </div>
    <textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"> <?php if (@$_POST['description'] != '') { echo $_POST['description']; } ?> </textarea>
    <div class="mb-20">
      <input type="file" name="photo"/>
        </div>
    <input class="button" type="submit" name="add_film" value="Добавить" style="padding-top: 0;">
  </form>
</div>