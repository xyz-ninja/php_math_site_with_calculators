<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Школьный сайт по алгебре.</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body>
	<?php include 'header.php'; ?>
	
 		<!-- <div class="wrapper" style="width: 500px; border: 2px solid #111; border-radius: 0px 0px 30px 30px; padding:50px;"> -->
		<div class="wrapper">

		 <?php include 'wrapper_left_block.php'; ?>
			<div id="wrapper_right_block">
			<h2 style="text-align: center;">Добавление новой статьи</h2>

			<ul class="article__hints">
				<li class="article__hints-item">В поле редактирования текста вы можете использовать все html теги!</li>
				<li class="article__hints-item">Вы так же можете использовать разметку Mathjax, для генерации формул. <a href="https://radioprog.ru/post/74">Примеры работы</a> </li>
				<li class="article__hints-item"><span style="color: red">Внимание!</span> Если в примере встречается символ - "\" то вам нужно будет продублировать его: "\\\"</li>
			</ul>

			<!-- после нажатия на кнопку submit данные обработаются в файле save_user.php -->
			<form action="save_article.php" method="post">
				<p class="article__name">Имя статьи: <input name="title" type="text" value="Безымянная статья" /></p>
				<textarea class="article__text" name="text">Здесь будет ваш текст!<br><strong>Привет мир!</strong></textarea> <br>
				<input class="article__button" name="submit" type="submit" value="Добавить статью" />
			</form>
 	
 		</div>
	</div>

 	<nav>
 	</nav>

</body>
</html>