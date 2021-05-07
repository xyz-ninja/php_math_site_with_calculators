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
    <link rel="stylesheet" type="text/css" href="style_test.css" />
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
			<article style="text-align: center; padding: 30px;"> 
				<?php
					# ЕСЛИ ПОЛЬЗОВАТЕЛЬ НЕ ВОШЁЛ НА САЙТ ТО ТЕСТ НЕДОСТУПЕН
					if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
						?>

						<h2>Вы не авторизировались!</h2>
						<h4>Войдите на сайт и повторите попытку.</h4>

						<?php
					
					} else {
                        # ЕСЛИ ПОЛЬЗОВАТЕЛЬ ВОШЁЛ И МЫ ПЕРЕДАЛИ РЕЗУЛЬТАТЫ ЧЕРЕЗ POST ЗАПРОС ИЛИ ОН УЖЕ ПРОШЁЛ ТЕСТ
                        # ПОКАЗЫВАЕМ ОЦЕНКУ
                        
                        $cur_id = $_SESSION['id'];
                        $user_row = mysqli_query($db, "SELECT * FROM users WHERE id = '$cur_id'"); # ищем строку с нашим пользователем
                        
                        # ЕСЛИ ПОЛЬЗОВАТЕЛЬ ТОЛЬКО ЧТО ПРОШЁЛ ТЕСТ
                        if ($_GET['score']) {
                            $user_score = $_GET['score'];
                            # вносим оценку в строку с нашим пользователем
                            $result = mysqli_query($db, "UPDATE users SET test_score='$user_score' WHERE id='$cur_id'");
                            
                            if ($result == 'TRUE') $_SESSION['test_score'] = $user_score;
                            else exit('ОШИБКА ПОДКЛЮЧЕНИЯ К БАЗЕ ДАННЫХ, <a href="index.php">назад</a>');
                        }
                        
                        if (empty($_SESSION['test_score'])) {
                            echo '<h1 style="color:red;">ВЫ ЕЩЕ НЕ ПРОШЛИ ТЕСТ!!!</h1>';
                            
                        # ЕСЛИ В СЕССИИ ЕСТЬ ДАННЫЕ О ОЦЕНКЕ, ВЫВОДИМ РЕЗУЛЬТАТ
                        } else {
                            echo '<h1>Вы закончили тест!</h1>';
                            echo'<h2>Ваша оценка '.$_SESSION['test_score'].' / 5</h2>';
                        }
					}

				?>
			</article>
		</div>
		<div style="margin: 0 auto"></div> <!-- это нужно что бы блоки не расплылись по странице -->
 	
	</div>

<div id="bottom_block">
	<nav>
		<?php
			# выводим группу из номерных переключателей страниц
			# вставляем ссылку через которую будет обрабатываться _GET запрос
			# href="index.php?page=<номер>" - это и есть обработчик _GET['page'] запроса
			
			# если возможно пролистать страницы назад, добавляем переключатель "Назад"
			if ($cur_page_number > 1) echo '<a href="index.php?page='.($cur_page_number-1).'"> Назад </a>';
			# если возможно пролистать страницы вперёд, добавляем переключатель "Вперёд"
			if ($cur_page_number < $pages_count) echo '<a href="index.php?page='.($cur_page_number+1).'"> Вперёд </a>';
		?>
	</nav>
</div>


</body>
</html>