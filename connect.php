<?php
$conf = parse_ini_file("config.ini");

# подключаемся к системе MySQL по данным из конфига(config.ini) и сохраняем базу данных в переменной $db
$db = mysqli_connect($conf['mysql_host'],$conf['mysql_user'],$conf['mysql_password']) or die('Ошибка подключения к MySQL');

# выбираем нужную базу данных, в нашем случае она называется "algebra" (данные из файла конфига)
mysqli_select_db($db, $conf['mysql_database']) or die('Ошибка подключение к базе данных (возможно такой базы данных нет)');
?>
