<?php
$title = $_POST['title'];
$text = $_POST['text'];

include('utils.php');

# преобразуем название статьи
$title = safe_var_transform($title);

# функция strlen получает длину строки
if (strlen($title) < 3) {
	echo 'Вы ввели слишком короткое название статьи или не ввели его вовсе!';
	echo'<a href="add_article.php">Вернуться</a>';
	exit;
} elseif (strlen($text) < 15) {
	echo 'Вы ввели слишком короткую статью! Минимальное количество символов: 15.';
	echo'<a href="add_article.php">Вернуться</a>';
	exit;
}

# получаем сегодняшниюю дату
$current_date = date("Y-m-d H:i:s");

include('connect.php');

# если всё нормально, добавляем статью в базу данных, в таблицу blog
$result = mysqli_query($db,"INSERT INTO blog (title,date,content) VALUES ('$title','$current_date','$text')");

if ($result == 'TRUE') {
	# перемещаемся обратно на главную страницу
	header('Location: index.php');
} else {
	echo 'ПРОИЗОШЛА СИСТЕМНАЯ ОШИБКА!';
	echo'<a href="add_article.php">Вернуться</a>';
}
?>