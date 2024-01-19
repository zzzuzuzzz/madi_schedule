<?php
    session_start();

    if (!$_SESSION['user'] && $_SESSION['profile']) {
        header('Location: ../schedulePro/profile.php');
    } else if ($_SESSION['user'] && $_SESSION['profile']) {
        unset($_SESSION['user']);
        header('Location: ../schedulePro/profile.php');
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
            <label>Введите свой Email</label>
            <input type="email" name="email" placeholder="madi@mail.ru">
            <label>Введите пароль</label>
            <input type="password" name="password" placeholder="********">
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
    <script src="../../assets/js/main.js"></script>
</body>
</html>