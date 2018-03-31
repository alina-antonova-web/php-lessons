<?php 

function greeting($name = "Гость") {
	echo "Привет $name! ";
	$today = getdate();
	if ( $today[wday] > 0 and $today[wday] < 6 ) {
		echo "Хорошего и продуктивного рабочего дня!";
	} else {
		echo "Желаю вам хорошо отдохнуть в этот день!";
	}	
}

greeting("Alina");

echo "<br><br><i>greeting()</i>:<br><br>";

greeting();

echo "<br><br><i>greeting_second('Alina', 1)</i>:<br><br>";

function greeting_second($name = "Гость", $day) {
	echo "Привет $name! ";
	switch ($day) {
		case 1:
			# code...
		case 2:
			# code...
		case 3:
			# code...
		case 4:
			# code...
		case 5:
			# code...
			echo "Хорошего и продуктивного рабочего дня!";
			break;
		case 6:
			# code...
		case 7:
			# code...
		default:
			echo "Желаю вам хорошо отдохнуть в этот день!";
			break;
	}
}

greeting_second("Alina", 1);

echo "<br><br><i>greeting_second()</i>:<br><br>";

greeting_second();
?>