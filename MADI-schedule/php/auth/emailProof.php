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
    <meta name="viewport" content="width=device-width">
    <title>Подтверждение почты</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

<div class="container">
    <form>
        <div class="hello">
            <img src="../../assets/img/svg/iconMadiBlack.svg" alt="лого">
            <p1>Расписание МАДИ</p1>
        </div>
        <p>Благодарим Вас за регистрацию. Вам осталось только подтвердить почту!</p>
        <button type="submit" class="btnProofEmail">Войти</button>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/auth/emailProof.js"></script>
</body>
</html>