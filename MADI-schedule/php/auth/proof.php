<?php

if (!$_COOKIE['codeProof']) {
    header('Location: auth.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Востановление пароля</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

<div class="container">
    <form>
        <div class="hello">
            <img src="../../assets/img/svg/iconMadiBlack.svg" alt="лого">
            <p1>Расписание МАДИ</p1>
        </div>
        <label>На вашу почту было отправлено сообщение. Пожайлуста, введите число из сообщения в это поле ввода</label>
        <input type="text" name="codeProof" placeholder="1528">
        <button type="submit" class="btnEnterToChangePassword">Продолжить</button>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/auth/forgotPassword.js"></script>
</body>
</html>