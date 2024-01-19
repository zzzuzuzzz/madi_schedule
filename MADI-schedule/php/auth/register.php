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
    <title>Регистрация</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

    <div class="container">
        <form>
            <label for="email">Введите свой Email</label>
            <input type="email" id="email" placeholder="madi@mail.ru" name="email">
            <label for="password">Введите пароль</label>
            <input title="Пароль должен состоять не менее чем из 8 символов. Так же в пароле не должно быть специальных символов (!,@,#,$,%,^,&,*,<,>,)." type="password" id="password" placeholder="********" name="password">
            <label for="passwordConfirm">Повторите пароль</label>
            <input title="Пароль должен состоять не менее чем из 8 символов. Так же в пароле не должно быть специальных символов (!,@,#,$,%,^,&,*,<,>,)." type="password" id="passwordConfirm" placeholder="********" name="passwordConfirm">
            <label for="firstName">Введите свое имя</label>
            <input type="text" id="firstName" placeholder="Иван" name="firstName">
            <label for="lastName">Введите свою фамилию</label>
            <input type="text" id="lastName" placeholder="Иванович" name="lastName">
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
    <script src="../../assets/js/main.js"></script>
</body>
</html>