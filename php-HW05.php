<?php
	print_r($_POST);
	

	if (!empty($_POST)){
		$headers = 'From: ' . $_POST['userName'] . ' <' . $_POST['userEmail'] . '>' . "\r\n" .
		    'Reply-To: ' . $_POST['userEmail'] . "\r\n";

		$message = "Вам пришло новое сообщение:\n" 
			. "Oт пользователя " . $_POST['userName'] . "\n"
			. "Email отправителя: ". $_POST['userEmail'] . "\n"
			. "Сообщение: \n". $_POST['userMessage'];

		$resultMail = mail("antonova.alina@gmail.com","Test message from HW05", $message, $headers);
		if ($resultMail) {
			echo "<div><strong style='color:green;'>Сообщение отправленно успешно!</strong></div>";	
		} else {
			echo "<div><strong style='color:red;'>Что-то пошло не так. Письмо не отправлено.</strong></div>";
		}
	}
?>


<form action="php-HW05.php" method="post">
	<input type="text" name="userName" placeholder="Ваше имя">
	<br>
	<input type="email" name="userEmail" placeholder="your_mail@mail.com">
	<br>
	<textarea name="userMessage" cols="30" rows="10" placeholder="Ваше сообщение"></textarea>
	<br>
	<input type="submit" value="Отправить">
</form>
