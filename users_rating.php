<?php
require_once dirname(__FILE__).'/connect.php';
# подключаем файл connect.php

session_start();
# начинаем сессия для того что бы запомнить залогинился пользователь или нет
# иначе просьба войти на сайт будет появлятся после обновления страницы
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Школьный сайт по алгебре.</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<!-- верхний блок сайта -->
	<?php include 'header.php'; ?>

 	<!-- блок-"обёртка"" сайта нужен что бы сайт не растягивался на весь экран, а был компактно размещён посередине-->
 	<div class="wrapper">
 		<!-- блок слева -->
 		<?php include 'wrapper_left_block.php'; ?>

		<!-- блок справа -->
		<div id="wrapper_right_block">
			<article> 
				<!-- выводим статьи с помощью php -->
				<table class="table_users_rating">
					<tr>
						<td class="t_users_rating_name" style="font-weight: bold;">Имя и Фамилия пользователя</td> 
						<td class="t_users_rating_score" style="font-weight: bold;">Оценка за тест</td>
					</tr>
				<?php 
					
					$users_data = mysqli_query($db, "SELECT * FROM users");

					# mysql_fetch_assoc - получает данные из ресурса полученного из Базы Данных в виде ассоциативного массива $row['<ключ>'] = <значение>
					
					# заполняем таблицу результатов
					while ($row = mysqli_fetch_assoc($users_data)) {
						echo "<tr>";
						echo "<td class='t_users_rating_name'>{$row['name']}</td>";
						
						if ($row['test_score'] == -1) echo "<td class='t_users_rating_score'>Нет оценки!</td>";
						else echo "<td class='t_users_rating_score'>{$row['test_score']}</td>";

						echo "</tr>";
					}
				?>
				</table>
			</article>
		</div>
		<div style="margin: 0 auto"></div> <!-- это нужно что бы блоки не расплылись по странице -->
 	
 	</div>



</body>
</html>