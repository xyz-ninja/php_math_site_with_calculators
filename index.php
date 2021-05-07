<?php
require dirname(__FILE__).'/connect.php';
# подключаем файл connect.php

session_start();
# начинаем сессия для того что бы запомнить залогинился пользователь или нет
# иначе просьба войти на сайт будет появлятся после обновления страницы

##### ПОЛУЧАЕМ ДАННЫЕ О СТАТЬЯХ #####

# получаем количество id из таблицы 'blog'

$ids_count = mysqli_query($db, "SELECT COUNT(id) FROM blog");

# прошлые полученные данный были типа resource через функцию mysql_fetch_array() превращаем данные в ассоциативный массив

$ids_count = mysqli_fetch_array($ids_count);

# рассчитываем количество страниц со статьями

$pages_count = (int) ($ids_count[0] - 1) / $conf['articles_per_page_limit'] + 1;

# проверям был ли от пользователя запрос на переключение страницы со статьями
if (isset($_GET['page'])) {
	// обрабатываем переключатель и получаем номер страницы к которой он ведёт
	$cur_page_number = (int) $_GET['page']; 
	
	// если число правильное и не превышает максимального количества страниц
	if ($cur_page_number > 0 && $cur_page_number <= $pages_count) {
		// проверям с какой статьи нужно начинать вывод
		
		$start_article_number = $cur_page_number * $conf['articles_per_page_limit'] - $conf['articles_per_page_limit'];
		$sql_q = "SELECT * FROM blog ORDER BY id DESC LIMIT {$start_article_number}, {$conf['articles_per_page_limit']}";	
	} else { 
		// иначе выводим статьи старым способом
		
		$sql_q = "SELECT * FROM blog ORDER BY id DESC LIMIT ".$conf['articles_per_page_limit'];
		$cur_page_number = 1;
	}
} else {
	# запрос - ВЫБРАТЬ * <все данные> ИЗ ТАБЛИЦЫ 'blog' В ПОРЯДКЕ <сорт. по дате>
	# DESC - инвертирует полученный массив, например [1,2,3] превращается в [3,2,1]
	# LIMIT - ограничивает количество данных полученных через запрос, в нашем случае 5 - так указано в конфиге config.ini
	$sql_q = "SELECT * FROM blog ORDER BY id DESC LIMIT ".$conf['articles_per_page_limit'];
	$cur_page_number = 1;

}

# получаем данные о статьях из базы данных
$articles_data = mysqli_query($db, $sql_q);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Школьный сайт по алгебре.</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
	<script type="text/x-mathjax-config">
	   MathJax.Hub.Config({
		  extensions: ["tex2jax.js"],
		  jax: ["input/TeX", "output/HTML-CSS"],
		  tex2jax: {
		  inlineMath: [ ['$','$'], ["\\(","\\)"] ],
		  displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
		  processEscapes: true
		  },
		  "HTML-CSS": { availableFonts: ["TeX"] }
	   });
    </script>
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
				<?php 
					# mysql_fetch_assoc - получает данные из ресурса полученного из Базы Данных в виде ассоциативного массива $row['<ключ>'] = <значение>
					while ($row = mysqli_fetch_assoc($articles_data)) {
						echo "<section>
							<h2>{$row['title']}</h2>
							{$row['content']}
							<p>{$row['date']}</p>
							</section>";
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