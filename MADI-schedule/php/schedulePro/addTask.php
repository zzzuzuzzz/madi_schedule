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
            <a href="task.php" class="exitToTask">Вернуться назад</a>
            <div class="title">
                <label for="title">Введите название предмета</label>
                <input type="text" id="title" placeholder="Название предмета" name="title">
            </div>
            <div class="text">
                <label for="text">Введите задание</label>
                <input type="text" id="text" placeholder="Сделать доклад по 1 варианту" name="text">
            </div>
            <div class="date">
                <label for="date">Выберете дату</label>
                <input type="date" id="date" name="date">
            </div>
            <button type="submit" class="saveLocalTask">Сохранить</button>
        </form>
    </div>
</div>

<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/schedulePro/headerButtons.js"></script>
<script src="../../assets/js/schedulePro/addTask.js"></script>
</body>
</html>