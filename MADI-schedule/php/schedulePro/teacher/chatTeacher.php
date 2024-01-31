<?php
session_start();

if ($_SESSION['user'] && !$_SESSION['profileTeacher']) {
    header('Location: ../scheduleLite/scheduleTeacher.php');
} else if (!$_SESSION['user'] && !$_SESSION['profileTeacher']) {
    header('Location: ../../../index.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Чат и контакты</title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
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