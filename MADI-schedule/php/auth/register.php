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
    <title>Регистрация</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

    <div class="container">
        <form>
            <div class="hello">
                <img src="../../assets/img/svg/iconMadiBlack.svg" alt="лого">
                <p1>Расписание МАДИ</p1>
            </div>
            <input type="email" id="email" placeholder="madi@mail.ru" name="Введите свой Email">
            <input title="Пароль должен состоять не менее чем из 8 символов. Так же в пароле не должно быть специальных символов (!,@,#,$,%,^,&,*,<,>,)." type="password" id="password" placeholder="Введите пароль" name="password">
            <input title="Пароль должен состоять не менее чем из 8 символов. Так же в пароле не должно быть специальных символов (!,@,#,$,%,^,&,*,<,>,)." type="password" id="passwordConfirm" placeholder="Повторите пароль" name="passwordConfirm">
            <input type="text" id="firstName" placeholder="Введите свое имя" name="firstName">
            <input type="text" id="lastName" placeholder="Введите свою фамилию" name="lastName">
            <label>
                <select name="select">
                    <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                    <option name="teacher" value="teacher">Вы преподователь</option>
                    <option name="student" value="student">Вы студент</option>
                </select>
            </label>
            <button type="submit" class="btnRegister">Зарегестрироваться</button>
            <p>
                У вас уже есть аккаунт? - <a href="auth.php">Войдите в него!</a>
            </p>
            <p class="msg none">Lorem ipsum.</p>
        </form>
    </div>

    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/auth/singup.js"></script>
</body>
</html>