<?php
    # начинаем сессию
    session_start();
    
    # подключаем волшебный файл utils.php
    include('utils.php');

    # проверяем данные так же как и в файле save_user.php
    if (isset($_POST['login'])) { $login = $_POST['login']; $login=safe_var_transform($login); if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password'];$password=safe_var_transform($password); if ($password =='') { unset($password);} }

    if (empty($login) or empty($password)) # если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    # подключаемся к базе данных
    include('connect.php'); 

    # ищем пользователя с таким логином
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
    # получаем подходящий ряд из таблицы
    $correct_row = mysqli_fetch_array($result);

    # проверяем есть ли такой пользователь вообще
    if (empty($correct_row['password'])) {
        exit ("Логин или пароль неправильные!");
    } else {
        # если пользователь есть, сверяем пароли
        if ($correct_row['password']==$password) {
        
            # если всё правильно вносим данные в переменные сессии что бы запомнить что пользователь на сайте
            $_SESSION['login'] = $correct_row['login']; 
            $_SESSION['id']=$correct_row['id'];
            $_SESSION['name']=$correct_row['name'];
            
            # проверяем проходил ли пользователь тест
            # если test_score == -1 значит пользователь не проходил тест
            if ($correct_row['test_score'] != -1)  $_SESSION['test_score'] = $correct_row['test_score'];
            
            # перемещаемся обратно на главную страницу
            header("Location: index.php");
            echo "Вы успешно вошли на сайт!"; 
            exit;
        } else {
            exit ("Логин или пароль неправильные!");
        }
    }
?>