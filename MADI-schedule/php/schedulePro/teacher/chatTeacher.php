<?php

if ($_COOKIE['user'] && !$_COOKIE["profileTeacher"]) {
    header('Location: ../../scheduleLite/schedule.php');
} else if (!$_COOKIE['user'] && !$_COOKIE["profileTeacher"] && !$_COOKIE['profileStudent']) {
    header('Location: ../../../index.php');
} else if (!$_COOKIE['user'] && !$_COOKIE["profileTeacher"] && $_COOKIE['profileStudent']) {
    header('Location: ../student/scheduleStudent.php');
} else if ($_COOKIE['user'] && $_COOKIE["profileTeacher"]) {
    setcookie('user', '', -1, '/');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Чат и контакты</title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
    <?php
    if (strval($_COOKIE['background']) === "white") {
        include "../../../assets/htmlBlocks/whiteCSS.html";
    } else if (strval($_COOKIE['background']) === "black") {
        include "../../../assets/htmlBlocks/blackCSS.html";
    }
    ?>
</head>
<body>

<?php
    include "../../../assets/htmlBlocks/buttons.php"
?>

<!--    <form>-->
<!---->
<!--    <a href="../../vendor/schedulePro/logout.php" class="logout">Выход</a>-->
<!--    </form>-->
<script src="../../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../../assets/js/schedulePro/teacher/headerTeacher.js"></script>
</body>
</html>