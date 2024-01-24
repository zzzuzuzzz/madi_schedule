<?php
session_start();

if (!$_SESSION['user'] && $_SESSION['profile']) {
    header('Location: ../schedulePro/schedule.php');
} else if ($_SESSION['user'] && $_SESSION['profile']) {
    unset($_SESSION['user']);
    header('Location: ../schedulePro/schedule.php');
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