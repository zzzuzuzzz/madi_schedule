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
    <link rel="stylesheet" href="../../assets/css/headerWebVer.css">
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
            <a href="schedule.php" class="exitToTask">Вернуться назад</a>
            <div class="lessonName">
                <label for="lessonName">Введите название предмета</label>
                <input type="text" id="lessonName" placeholder="Русский язык" name="lessonName">
            </div>
            <div class="lessonType">
                <label for="lessonType">Введите тип занятия</label>
                <input type="text" id="lessonType" placeholder="Лекция" name="lessonType">
            </div>
            <div class="building">
                <label for="building">Введите корпус</label>
                <input type="text" id="building" placeholder="Лабораторный" name="building">
            </div>
            <div class="audience">
                <label for="audience">Введите аудиторию</label>
                <input type="text" id="audience" placeholder="204" name="audience">
            </div>
            <div class="teacher">
                <label for="teacher">Выберете преподователя из списка контактов или введите имя самостоятельно</label>
                <input type="text" id="teacher" placeholder="Иванов И.И." name="teacher">
            </div>
            <div class="date">
                <label for="date">Выберете дату</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="time">
                <label for="time">Выберете время</label>
                <input type="time" id="time" name="time">
            </div>
            <button type="submit" class="saveLocalSchedule">Сохранить</button>
        </form>
    </div>
</div>

<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/schedulePro/headerButtons.js"></script>
<script src="../../assets/js/schedulePro/addSchedule.js"></script>
</body>
</html>