<?php
require_once dirname(__FILE__).'/connect.php';
# подключаем файл connect.php

session_start();
# начинаем сессия для того что бы запомнить залогинился пользователь или нет
# иначе просьба войти на сайт будет появлятся после обновления страницы

if (!empty($_SESSION['test_score'])) {
# если пользователь уже прошёл тест
# перенаправляем его на страницу с результатами
header("Location: test_algebra_results.php"); 
exit;
}
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

 					# ЕСЛИ ПОЛЬЗОВАТЕЛЬ ВОШЁЛ И НЕ ПРОХОДИЛ ТЕСТ, ПОКАЗЫВАЕМ ЕМУ ЕГО
                    } else {
						?>
                        <div class="test_tab" id="step1" style="display: block;">
                            <h2>Шаг 1/5</h2>
                            
                            <h3>Задание:</h3> <img class="test_tab_img" src="img/test_algebra/tab1/ex.jpg">
                            
                            <!-- секция с ответами, при нажатии на div блок функция nextStep анализирует ответ -->
                            <br>
                            <button class="test_tab_answer_block" id="block1" onclick="nextStep('a')"> 
                                <h2>a)</h2><img class="test_tab_img"  src="img/test_algebra/tab1/cor.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block2" onclick="nextStep('b')"> 
                                <h2>b)</h2><img class="test_tab_img"  src="img/test_algebra/tab1/wr1.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block3" onclick="nextStep('c')"> 
                                <h2>c)</h2><img class="test_tab_img" src="img/test_algebra/tab1/wr2.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block4" onclick="nextStep('d')"> 
                                <h2>d)</h2><img class="test_tab_img" src="img/test_algebra/tab1/wr3.jpg" />
                            </button>
                            <br>
                        </div>
				        
                        <div class="test_tab" id="step2" style="display: none;">
                            <h2>Шаг 2/5</h2> 
                            
                            <h3>Задание:</h3> <img class="test_tab_img" src="img/test_algebra/tab2/ex.jpg">
                            
                            <!-- секция с ответами, при нажатии на div блок функция nextStep анализирует ответ -->
                            <br>
                            <button class="test_tab_answer_block" id="block1" onclick="nextStep('a')"> 
                                <h2>a)</h2><img class="test_tab_img" src="img/test_algebra/tab2/wr2.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block2" onclick="nextStep('b')"> 
                                <h2>b)</h2><img class="test_tab_img" onclick="nextStep('b')" src="img/test_algebra/tab2/wr1.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block3" onclick="nextStep('c')"> 
                                <h2>c)</h2><img class="test_tab_img" src="img/test_algebra/tab2/cor.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block4" onclick="nextStep('d')"> 
                                <h2>d)</h2><img class="test_tab_img" src="img/test_algebra/tab2/wr3.jpg" />
                            </button>
                            <br>
                        </div>
                        
                        <div class="test_tab" id="step3" style="display: none;">
                            <h2>Шаг 3/5</h2>
                            
                            <h3>Задание:</h3> <img class="test_tab_img" src="img/test_algebra/tab3/ex.jpg">
                            
                            <!-- секция с ответами, при нажатии на div блок функция nextStep анализирует ответ -->
                            <br>
                            <button class="test_tab_answer_block" id="block1" onclick="nextStep('a')"> 
                                <h2>a)</h2><img class="test_tab_img" src="img/test_algebra/tab3/wr2.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block2" onclick="nextStep('b')"> 
                                <h2>b)</h2><img class="test_tab_img"  src="img/test_algebra/tab3/cor.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block3" onclick="nextStep('c')"> 
                                <h2>c)</h2><img class="test_tab_img" src="img/test_algebra/tab3/wr1.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block4" onclick="nextStep('d')"> 
                                <h2>d)</h2><img class="test_tab_img" src="img/test_algebra/tab3/wr3.jpg" />
                            </button>
                            <br>
                        </div>
                
                        <div class="test_tab" id="step4" style="display: none;">
                            <h2>Шаг 4/5</h2>
                            
                            <h3>Задание:</h3> <img class="test_tab_img" src="img/test_algebra/tab4/ex.jpg">
                            
                            <!-- секция с ответами, при нажатии на div блок функция nextStep анализирует ответ -->
                            <br>
                            <button class="test_tab_answer_block" id="block1" onclick="nextStep('a')"> 
                                <h2>a)</h2><img class="test_tab_img" src="img/test_algebra/tab4/wr2.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block2" onclick="nextStep('b')"> 
                                <h2>b)</h2><img class="test_tab_img" src="img/test_algebra/tab4/cor.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block3" onclick="nextStep('c')"> 
                                <h2>c)</h2><img class="test_tab_img"  src="img/test_algebra/tab4/wr1.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block4" onclick="nextStep('d')"> 
                                <h2>d)</h2><img class="test_tab_img" src="img/test_algebra/tab4/wr3.jpg" />
                            </button>
                            <br>
                        </div>
                
                        <div class="test_tab" id="step5" style="display: none;">
                            <h2>Шаг 5/5</h2>
                            
                            <h3>Задание:</h3> <img class="test_tab_img" src="img/test_algebra/tab5/ex.jpg">
                            
                            <!-- секция с ответами, при нажатии на div блок функция nextStep анализирует ответ -->
                            <br>
                            <button class="test_tab_answer_block" id="block1" onclick="nextStep('a')"> 
                                <h2>a)</h2><img class="test_tab_img" src="img/test_algebra/tab5/wr2.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block2" onclick="nextStep('b')"> 
                                <h2>b)</h2><img class="test_tab_img"  src="img/test_algebra/tab5/wr3.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block3" onclick="nextStep('c')"> 
                                <h2>c)</h2><img class="test_tab_img" src="img/test_algebra/tab5/wr1.jpg" />
                            </button>
                            <br>
                            <button class="test_tab_answer_block" id="block4" onclick="nextStep('d')">
                                <h2>d)</h2><img class="test_tab_img" src="img/test_algebra/tab5/cor.jpg" />
                            </button>
                            <br>
                        </div>
                
                        <script type="text/javascript">
                            
                            var currentStep = 1;
                            var currentDiv = null;
                            
                            nextStep(null);
                            
                            var userScore = 0; // итоговый балл который будет внесён в базу данных, зависит от количества правильных ответов
                            
                            var isTestFinished = false; // закончен ли тест
                            
                            function nextStep(answer){
                                // переменная-аргумент answer получаем в виде строки "a" "b" "c" "d"
                                // с её помощью получаем ответ который выбрал пользователь, проверяем его в функции analyzeCurrentStep(a)
                                // если он правильный на данном шаге
                                // то прибавляем 1 к итоговому баллу
                                
                                if (answer != null) currentStep += 1;
                                analyzeCurrentStep(answer);
                                
                                
                            }
                            
                            // acbbd
                            
                            // функция анализирует какой сейчас шаг теста, и в зависимости от этого показывает нужный div-блок
                            function analyzeCurrentStep(answer){
                               
                                console.log(currentStep)
                                
                                // ищем нужный блок в зависимости от шага
                                if (answer == null) console.log("null answer");
                                else console.log(answer);
                                
                                if (currentStep == 1) {    
                                    currentDiv = document.getElementById("step1");
                                    
                                        
                                } else if (currentStep == 2) {
                                    currentDiv = document.getElementById("step2");
                                    if (answer === "a") userScore++;
                                    
                                } else if (currentStep == 3) {
                                    currentDiv = document.getElementById("step3");
                                    if (answer === "c") userScore++;
                                    
                                } else if (currentStep == 4) {
                                    currentDiv = document.getElementById("step4");
                                    if (answer === "b") userScore++;
                                    
                                } else if (currentStep == 5) {
                                    currentDiv = document.getElementById("step5");
                                    if (answer === "b") userScore++;
                                    
                                } else {
                                    if (answer === "d") userScore++;
                                    
                                    if (userScore == null) console.log("SCORE UNDEFINED");
                                    else console.log("score " + userScore.toString())
                                    
                                    console.log("КОНЕЦ ТЕСТА!");
                                    
                                    // перемещаемся на страницу php которая обработает оценку
                                    // и внесёт данные в базу данных
                                    window.location.href="test_algebra_results.php?score="+userScore;
                                }
                                
                                 // скрываем все div-блоки
                                clearAllTestDivs();
                                // отображаем выбранный блок
                                currentDiv.style.display = "block";
                            }
                            
                            // функция скрывает все div-блоки класса test_tab
                            function clearAllTestDivs() {
                                // получаем все элементы с классом "test_tab"
                                let testTabs = document.getElementsByClassName("test_tab");
                                // скрываем их
                                for (let i = 0; i < testTabs.length; i++) {
                                    testTabs[i].style.display = "none";
                                }
                            }
                            
                        </script>        
                
						<?php
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