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
    <title>Чат и контакты</title>
    <link rel="stylesheet" href="../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../assets/css/headerForChatAndProfile.css">
    <?php
    if (strval($_COOKIE['background']) === "white") {
        include "../../assets/htmlBlocks/whiteCSS.html";
    } else if (strval($_COOKIE['background']) === "black") {
        include "../../assets/htmlBlocks/blackCSS.html";
    }
    ?>
    <link rel="stylesheet" href="../../assets/css/schedulePro/contactTeacher.css">
</head>
<body>

<?php
include "../../assets/htmlBlocks/buttons.php"
?>

<div class="container">
    <div class="addContactLocalField">
        <form class="form">
            <a href="contact.php" class="exitToContact">Вернуться назад</a>
            <div class="firstName">
                <label for="firstName">Введите имя</label>
                <input type="text" id="firstName" placeholder="Иван" name="firstName">
            </div>
            <div class="lastName">
                <label for="lastName">Введите фамилию</label>
                <input type="text" id="lastName" placeholder="Иванович" name="lastName">
            </div>
            <div class="email">
                <label for="email">Введите Email</label>
                <input type="email" id="email" placeholder="madi@mail.ru" name="email">
            </div>
            <div class="select">
                <label>
                    <select name="select" class="selectInDiv">
                        <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                        <option name="teacher" value="teacher">Преподователь</option>
                        <option name="student" value="student">Студент</option>
                    </select>
                </label>
            </div>
            <input type="file" class="avatarInput" name="avatar">
            <button type="submit" class="saveLocalFriend">Сохранить</button>
        </form>
    </div>
</div>

<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/schedulePro/headerButtons.js"></script>
<script src="../../assets/js/schedulePro/addContactLocal.js"></script>
</body>
</html>