<?php
# скрипт для того что бы пользователь мог разлогиниться
session_start();

# удаляем данные сессии
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['login']);
unset($_SESSION['test_score']);

# перемещаемся обратно на главную страницу
header("Location: index.php"); 
exit;
?>