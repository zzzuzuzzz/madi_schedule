<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: php/profile.php');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form action="vendor/signin.php" method="post">
        <label for="email">Введите свой Email</label>
        <input type="email" id="email" name="email" placeholder="madi@mail.ru">
        <label for="password">Введите пароль</label>
        <input type="password" id="password" name="password" placeholder="********">
        <button type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="php/register.php">Зарегистрируйтесь!</a>
        </p>
        <?php
        if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
            echo '<p class="msg"> ' . $_SESSION['msg'] . ' </p>';
            unset($_SESSION['msg']);
        }
        ?>
    </form>
</body>
</html>