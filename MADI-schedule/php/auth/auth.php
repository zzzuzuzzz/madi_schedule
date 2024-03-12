<?php

if (!$_COOKIE['user'] && $_COOKIE['profile']) {
    header('Location: ../schedulePro/schedule.php');
} else if ($_COOKIE['user'] && $_COOKIE['profile']) {
    setcookie('user', '', -1, '/');
    header('Location: ../schedulePro/schedule.php');
} else if ($_COOKIE['user'] && !$_COOKIE['profile']) {
    header('Location: ../scheduleLite/schedule.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

    <div class="container">
        <form>
            <div class="hello">
                <img src="../../assets/img/svg/iconMadiBlack.svg" alt="лого">
                <p1>Расписание МАДИ</p1>
            </div>
            <input type="email" name="email" placeholder="Введите email">
            <input type="password" name="password" placeholder="Введите пароль">
            <button type="submit" class="btnEnterToSchedulePro">Войти</button>
            <p>
                У вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь!</a>
            </p>
            <p>
                <a href="forgotPassword.php">Забыли пароль?</a>
            </p>
            <p class="msg none">Lorem ipsum dolor sit amet.</p>
        </form>
    </div>


    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/auth/singin.js"></script>
</body>
</html>