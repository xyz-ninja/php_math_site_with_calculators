<?php

# В PHP ЧЕРЕЗ ПОЛЯ ФОРМЫ МОЖНО ПЕРЕДАТЬ ЦЕЛЫЙ СКРИПТ КОТОРЫЙ ВЫПОЛНИТСЯ ЕСЛИ НЕ ОБРАБОТАТЬ ТЕКСТОВЫЕ ПЕРЕМЕННЫЕ
# например в поле ввода логина можно написать '<script type="text/javacript">console.log('вот тебе и логин');</script>'
# и скрипт на js выполнится
# для защиты обязательно надо прогнать текстовые данные через функции stripslashes() и htmlspecialchars()
# так же можно удалить лишние пробелы слева и справа функцией trim(), например: ' vanya   ' превратится в 'vanya'
# что бы не писать эти функции три раза для одной переменной создадим свою функцию safe_var_transform() в файле 
# utils.php,    и будем прогонять текстовые переменные через неё

# собственно подключим этот файл
include('utils.php');

# ПРОВЕРЯЕМ ДАННЫЕ ПЕРЕДАННЫЕ ФОРМОЙ
# проверям логин
if (isset($_POST['login'])) { 
	$login = $_POST['login'];

	# обрабатываем переменную функций
	$login = safe_var_transform($login);

	# если логин пустой опустошаем переменную
	if ($login == '') {
		unset($login);
	}
}
# проверяем пароль так же как и логин
if (isset($_POST['password'])) { 
	$password = $_POST['password']; 
	$password = safe_var_transform($password);
	if ($password == '') {
		unset($password);
	}
}
# так же само проверяем поле для ввода имени
if (isset($_POST['name'])) { 
	$name = $_POST['name'];
	$name = safe_var_transform($name);
	if ($name == '') {
		unset($name);
	}
}

# ЕСЛИ ХОТЯ БЫ ОДНА ИЗ ПЕРЕМЕННЫХ НЕ НАЗНАЧЕНА ВЫВОДИМ ОШИБКУ И ПРЕРЫВАЕМ СКРИПТ
if (empty($login) or empty($password) or empty($name)) {
	exit('Вы заполнили не все поля, необходимые для регистрации!');
}

# ЕСЛИ ПОКА ВСЁ ПРАВИЛЬНО ПОДКЛЮЧАЕМСЯ К БАЗЕ ДАННЫХ ЧЕРЕЗЗ ФАЙЛ connect.php
include('connect.php');

# ищем людей с таким же логином
$same_login_user = mysqli_query($db, "SELECT id FROM users WHERE login = '".$login."'");
$same_login_row = mysqli_fetch_assoc($same_login_user);

# если такие есть, выводим ошибку
if (!empty($same_login_row['id'])) {
	exit('Извините пользователь с таким логином уже есть! Пожалуйста, выберите другой.');
} 

# если такого нет, вносим данные в базу данных, в таблицу 'users'
#$result_query = "INSERT INTO `users` (login,password,name) VALUES ('".$login."','".$password."','".$name."')";
$result_query = "INSERT INTO `users` SET name = '".$name."', login = '".$login."', password = '".$password."'";

if (mysqli_query($db, $result_query)) {
	echo "Вы успешно зарегистрировались!<br><a href='index.php'>Вернуться на главную страницу</a>";
} else {
	echo "Произошла системная ошибка! Что-то не так с базой данных!!!";
}




?>