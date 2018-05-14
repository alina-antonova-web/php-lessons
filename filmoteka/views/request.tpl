<div class="panel-holder mt-20 mb-40">    
  <div class="title-4 mt-0">Укажите ваши данные</div>
  <form action="set-cookie.php" method="POST" class='mb-20'>
    <label class="label-title">Ваше имя</label>
    <input class="input" type="text" placeholder="Ваше имя" name="user-name" <?php if (@$_COOKIE['user-name'] != '') { echo "value = '" .$_COOKIE['user-name']. "'"; } ?> />

    <label class="label-title">Ваш  город</label>
    <input class="input" type="text" placeholder="Ваш город" name="user-city" <?php if (@$_COOKIE['user-city'] != '') { echo "value = '" .$_COOKIE['user-city']. "'"; } ?> />
    
    <input class="button" type="submit" name="user-submit" value="Отправить" style="padding-top: 0;">
  </form>

  <form action="unset-cookie.php" method="POST">
    <input class="button" type="submit" name="user-unset" value="Удалить данные" style="padding-top: 0;">
  </form>
</div>