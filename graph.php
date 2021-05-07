<?php
require_once dirname(__FILE__).'/connect.php';
# подключаем файл connect.php

session_start();
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
				
				<h2>Нарисовать график функции</h2>
				<canvas id=canvas width=500 height=500 style="border: 1px solid #74a2c8;"></canvas><br /><br />
				
				<input id=txt type=text placeholder=" введите функцию " />
				<button onclick="draw()">Нарисовать график</button>
				<button onclick="clearCtx()">Очистить холст</button>

				<script type="text/javascript">
					var cw = canvas.width, ch = canvas.height; // получаем ширину/высоту холста

					var ctx = document.getElementById("canvas").getContext("2d");
					var m = 10; // масштаб отображения, в данном случае единица составляет 10 px
					
					initCtx();

					// задать начальные настройки ctx
					function initCtx() {
						// задаём холсту белый цвет
						ctx.fillStyle = "white";
						ctx.fillRect(0, 0, cw, ch);

						// рисуем оси координат
						// x
						// линия
						ctx.lineWidth = 2;
						ctx.moveTo(0, ch / 2);
						ctx.lineTo(cw, ch / 2);
						ctx.strokeStyle = "#ddd";
						ctx.stroke();
						// текст
						ctx.strokeStyle = "blue";
						ctx.font = "15px Tahoma";
						ctx.strokeText("x", cw - 15, ch / 2 - 5);
						// y
						ctx.lineWidth = 2;
						ctx.moveTo(cw / 2, 0);
						ctx.lineTo(cw / 2, ch);
						ctx.strokeStyle = "#ddd";
						ctx.stroke();
						// текст
						ctx.strokeStyle = "blue";
						ctx.font = "15px Tahoma";
						ctx.strokeText("y", cw / 2 + 15, 15);
					}

					// функция рисует заданный график
					function draw(){
						for(x = -cw / 2 / m; x < cw / 2 / m; x += 1 / m){
							eval(document.getElementById("txt").value);
							ctx.fillStyle = "green";
							ctx.fillRect(x * m + cw / 2, ch - (y * m + ch / 2), 1, 1);
						}
					}

					// функция очищает холст
					function clearCtx() {
						ctx.clearRect(0, 0, cw, ch);
						initCtx();
					}

				</script>

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