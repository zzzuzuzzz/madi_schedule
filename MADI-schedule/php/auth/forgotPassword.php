<?php

if (!$_COOKIE['user'] && $_COOKIE['profileStudent']) {
    header('Location: ../schedulePro/student/scheduleStudent.php');
} else if (!$_COOKIE['user'] && $_COOKIE['profileTeacher']) {
    header('Location: ../schedulePro/teacher/scheduleTeacher.php');
} else if ($_COOKIE['user'] && $_COOKIE['profileStudent']) {
    setcookie('user', '', -1, '/');
    header('Location: ../schedulePro/student/scheduleStudent.php');
} else if ($_COOKIE['user'] && $_COOKIE['profileTeacher']) {
    setcookie('user', '', -1, '/');
    header('Location: ../schedulePro/teacher/scheduleTeacher.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Востановление пароля</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

<div class="container">
    <form>
        <label>Для востановления пароля введите свой email</label>
        <input type="email" name="email" placeholder="madi@mail.ru">
        <button type="submit" class="btnEnterToProof">Продолжить</button>
        <p>
            <a href="auth.php">Вернутся к авторизации</a>
        </p>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/auth/forgotPassword.js"></script>
</body>
</html>