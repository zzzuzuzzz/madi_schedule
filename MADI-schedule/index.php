<?php
    session_start();

//    if (!$_SESSION['user'] && !$_SESSION['profile']) {
//        header('Location: index.php');
//    } else if (!$_SESSION['user'] && $_SESSION['profile']) {
//        header('Location: php/schedulePro/scheduleTeacher.php');
//    } else if ($_SESSION['user'] && !$_SESSION['profile']) {
//        header('Location: php/scheduleLite/scheduleTeacher.php');
//    } else if ($_SESSION['user'] && $_SESSION['profile']) {
//        unset($_SESSION['user']);
//        header('Location: php/schedulePro/scheduleTeacher.php');
//    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <div class="container">
        <form>
            <p>Добро пожаловать!</p>
            <label>
                <select name="select">
                    <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                    <option name="teacher" value="teacher">Вы преподователь</option>
                    <option name="student" value="student">Вы студент</option>
                </select>
            </label>
            <button type="submit" class="btnEnterToScheduleLite">Продолжить</button>
            <p>
                У вас есть аккаунт? - <a href="php/auth/auth.php">Войдите в него!</a>
            </p>
            <p>
                У вас нет аккаунта? - <a href="php/auth/register.php">Зарегистрируйтесь!</a>
            </p>
            <p class="msg none">Lorem ipsum dolor sit amet.</p>
        </form>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>