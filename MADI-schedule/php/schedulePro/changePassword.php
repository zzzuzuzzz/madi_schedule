<?php
if ($_COOKIE['user'] && !$_COOKIE["profile"]) {
    header('Location: ../scheduleLite/schedule.php');
} else if (!$_COOKIE['user'] && !$_COOKIE["profile"]) {
    header('Location: ../../index.php');
} else if ($_COOKIE['user'] && $_COOKIE["profile"]) {
    setcookie('user', '', -1, '/');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Смена пароля</title>
</head>
<body>

<div class="container">
    <form>
        <label>Введите новый пароль</label>
        <input type="password" name="password" placeholder="********">
        <label>Повторите пароль</label>
        <input type="password" name="passwordConfirm" placeholder="********">
        <button type="submit" class="btnChangePassword">Сменить пароль</button>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/schedulePro/changePassword.js"></script>
</body>
</html>