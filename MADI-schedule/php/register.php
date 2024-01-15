<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../assets/css/main.css">
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
            <label for="fullName">Введите свое имя</label>
            <input type="text" id="fullName" placeholder="Иван Иванович" name="fullName">
            <label>
                <select name="select">
                    <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                    <option name="teacher" value="teacher">Вы преподователь</option>
                    <option name="student" value="student">Вы студент</option>
                </select>
            </label>
            <button type="submit" class="btnRegister">Зарегестрироваться</button>
            <p>
                У вас уже есть аккаунт? - <a href="../index.php">Войдите в него!</a>
            </p>
            <p class="msg none">Lorem ipsum.</p>
        </form>
    </div>

    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>