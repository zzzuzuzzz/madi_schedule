<?php
session_start();

if (!$_SESSION['codeFromEmail']) {
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
        <label>На вашу почту было отправлено сообщение. Пожайлуста, введите число из сообщения в это поле ввода</label>
        <input type="text" name="codeProof" placeholder="1528">
        <button type="submit" class="btnEnterToChangePassword">Продолжить</button>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/main.js"></script>
</body>
</html>