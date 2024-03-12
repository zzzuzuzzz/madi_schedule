<?php

if (!$_COOKIE['user'] && $_COOKIE['profile']) {
    header('Location: php/schedulePro/schedule.php');
} else if ($_COOKIE['user'] && $_COOKIE['profile']) {
    setcookie('user', '', -1, '/');
    header('Location: php/schedulePro/schedule.php');
} else if ($_COOKIE['user'] && !$_COOKIE['profile']) {
    header('Location: php/scheduleLite/schedule.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="manifest" href="manifest.json">
</head>
<body>

    <div class="container">
        <form>
            <div class="hello">
                <img src="assets/img/svg/iconMadiBlack.svg" alt="лого">
                <p1>Расписание МАДИ</p1>
            </div>
            <button type="button" class="btnEnterToAuth">Войти в свой аккаунт</button>
            <button type="submit" class="btnEnterToScheduleLite">Продолжить без входа</button>
            <p>
                У вас нет аккаунта? - <a href="php/auth/register.php">Зарегистрируйтесь!</a>
            </p>
            <p>
                <a href="php/info.php">Хотите узнать подробнее о нас?</a>
            </p>
            <p class="msg none">Lorem ipsum dolor sit amet.</p>
        </form>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>