<!-- ЭТО ЛЕВАЯ ЧАСТЬ БЛОКА "ОБЕРТКИ"-->

<div id="wrapper_left_block">
	<div id="wrapper_left_block_up">
	<?php
	##### ПОЛУЧАЕМ ДАННЫЕ О ТОМ ВОШЁЛ ЛИ ПОЛЬЗОВАТЕЛЬ #####

	# Проверяем, пусты ли переменные логина и id пользователя в сессии
		# ПОЛЬЗОВАТЕЛЬ НЕ ВОШЁЛ НА САЙТ
	if (empty($_SESSION['login']) or empty($_SESSION['id']))
	{
		# Если пусты, то пользователь не вошёл на сайт

		# Выводим форму входа на сайт
	?>
			<form class="sign-form"action="check_user.php" method="post">
				<!-- check_user.php - это адрес файла-обработчика. После нажатия на кнопку  "Войти", данные из полей отправятся на страницу check_user.php методом  "post" -->
				<p>
					Логин:
					<input class="login" name="login" type="text" size="15" maxlength="15">
				</p>

				<p>
					Пароль:
					<input class="password" name="password" type="password" size="15" maxlength="15">
				
				</p>
				<input class="form__button" type="submit" name="submit" value="Войти">
			</form>
			<?php
		# echo "Вы просматриваете сайт как гость.<br><a href='register.php'>Регистрация</a>";
		echo "<a class='form__register' href='register.php'>Регистрация</a>";
	}
	# ПОЛЬЗОВАТЕЛЬ ВОШЁЛ НА САЙТ
	else
	{
		echo "Добро пожаловать, ".$_SESSION['name']."<br>";
		echo "<a href='logout_user.php'>Выйти</a>";
		# проверяем является ли пользователь админом

		$session_id = $_SESSION['id'];

		$is_admin_q = mysqli_query($db, "SELECT is_admin FROM users WHERE id='$session_id'");
		$user_row = mysqli_fetch_array($is_admin_q);

		# если является, выводим ему админ панель

		# ПОЛЬЗОВАТЕЛЬ ОБЛАДАЕТ ПРАВАМИ АДМИНИСТРАТОРА
		if ($user_row['is_admin'] == '1') {
		?>
				<p style="color: red;">Вы обладаете правами администратора!</p>

				<!-- <a href="add_article.php">Добавить статью</a> -->
				<?php
		}
	}
?>
	</div>
	<div id="wrapper_left_block_down" style="text-align: center;">
		<a class="wrapper_left__test" href="test_algebra.php">Тест</a>
		<a class="wrapper_left__result" href="users_rating.php">Результаты теста</a>
		<a class="wrapper_left__graph" href="graph.php">Построить график функции</a>
		<a class="wrapper_left__calc" href="calculator.php">Калькуляторы</a>
		<?php
			if (!empty($user_row) && $user_row['is_admin'] == '1'){
			?>
                <hr><br>
				<a class="wrapper_left__article" href="add_article.php">Добавить статью</a>
			<?php
			}
		?>
	</div>
</div>