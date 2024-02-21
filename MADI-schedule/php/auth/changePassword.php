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
        <label>Введите новый пароль</label>
        <input type="password" name="password" placeholder="********">
        <label>Повторите пароль</label>
        <input type="password" name="passwordConfirm" placeholder="********">
        <button type="submit" class="btnEnterToAuthFromChangePassword">Сменить пароль</button>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/auth/forgotPassword.js"></script>
</body>
</html>