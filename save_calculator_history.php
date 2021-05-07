<?php
	session_start();
	require 'connect.php';
	require 'calculator_utils.php';

	// добавляем текст расчётов в базу данных
	if (!empty($_SESSION['id'])) {
		$session_id = $_SESSION['id'];
		$label_text = $_POST['label_text'];

		//$calc_history_q = "INSERT INTO calc_history (user_id, text) VALUES ('$session_id', '$label_text'";
		$calc_history_q = "INSERT INTO `calc_history` SET user_id='".$session_id."',text='".$label_text."'";
		if (!mysqli_query($db, $calc_history_q)) {
			echo "Произошла ошибка в базе данных.<br>";
		}
	}

	// получаем обновленные данные
	generateHistoryContent($db);
?>