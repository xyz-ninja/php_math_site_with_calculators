<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Школьный сайт по алгебре</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<?php include 'header.php'; ?>
 	<div class="wrapper" style="background: #f4f4ef;width: 500px; border: 2px solid #111; border-radius: 0px 0px 30px 30px; padding:50px;">
 		<h2 style="text-align: center;">Регистрация нового пользователя</h2>

 		<form action="save_user.php" method="post">
 			<p><b>Логин:</b> 
 				<input class="login" name="login" type="text" size="15" maxlength="15" />
 			</p>
 			
 			<p><b> Пароль:</b> 
 				<input class="password" name="password" type="password" size="15" maxlength="15" /> 
 			</p>
 			
 			<p><b>Имя и Фамилия:</b>
 				<input name="name" type="text" size="35" maxlength="15" />
 			</p>
			<div style="display: flex; justify-content: center; margin-top: 50px;">
 				<input class="register__button" type="submit" name="submit" value="Зарегистрироваться" />
			</div>
 		</form>
 	
 	</div>

 	<nav>
 	</nav>

</body>
</html>