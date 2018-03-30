<?php 
$link = mysqli_connect('localhost', 'test_db', '123qwe', 'test_db');

if ( mysqli_connect_error() ) {
	die("Ошибка подключения к базе данных.");
}

if (!empty($_POST) and array_key_exists('add_user', $_POST) ){
	if ($_POST['name'] == '') {
		echo "<div style='color:red;'>Необходимо ввести имя!</div>";
	} else if ($_POST['email'] == '') {
		echo "<div style='color:red;'>Необходимо ввести E-mail!</div>";
	} else if ($_POST['password'] == '') {
		echo "<div  style='color:red;'>Необходимо ввести пароль!</div>";
	} else {
		$add_query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES (	'" . mysqli_real_escape_string($link, $_POST['name']) . "',
				'" . mysqli_real_escape_string($link, $_POST['email']) . "',
				'" . mysqli_real_escape_string($link, $_POST['password']) . "' 
			) ";

		if (mysqli_query($link, $add_query) ) {
			echo "<div style='color:green;'>Пользователь успешно добавлен!</div>";
		} else {
			echo "<div style='color:red;'>Произошла ошибка при добавлении пользователя!</div>";
		}
	}
	
}

?>
<br>
<form action="index.php" method="post">
	<input type="text" name="name" placeholder="Имя"><br>
	<input type="email" name="email" placeholder="Email"><br>
	<input type="password" name="password" placeholder="******"><br>
	<input type="submit" value="Добавить пользователя" name="add_user">
</form>


<?php 
$query = "SELECT * FROM users";

if ( $result = mysqli_query($link, $query) ) {
	
	echo "<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Email</th>
				<th>Пароль</th>
			</tr>
		</thead>
		<tbody>";

	while ( $row = mysqli_fetch_array($result) ) {

		echo "<tr>
				<td>". $row['id'] ."</td>
				<td>". $row['name'] ."</td>
				<td>". $row['email'] ."</td>
				<td>". $row['password'] ."</td>
			</tr>";
	}	

	echo "</tbody>
	</table>";
}

?>