<?php

if (!$_COOKIE['codeProof']) {
    header('Location: auth.php');
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
        <div class="hello">
            <img src="../../assets/img/svg/iconMadiBlack.svg" alt="лого">
            <p1>Расписание МАДИ</p1>
        </div>
        <input type="password" name="password" placeholder="Введите новый пароль">
        <input type="password" name="passwordConfirm" placeholder="Повторите пароль">
        <button type="submit" class="btnEnterToAuthFromChangePassword">Сменить пароль</button>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/auth/forgotPassword.js"></script>
</body>
</html>