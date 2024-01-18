<?php
    session_start();

    if (!$_SESSION['user'] && !$_SESSION['profile']) {
        header('Location: ../../index.php');
    } else if (!$_SESSION['user'] && $_SESSION['profile']) {
        header('Location: ../schedulePro/scheduleTeacher.php');
    } else if ($_SESSION['user'] && !$_SESSION['profile']) {
        header('Location: scheduleTeacher.php');
    } else if ($_SESSION['user'] && $_SESSION['profile']) {
        unset($_SESSION['user']);
        header('Location: ../schedulePro/scheduleTeacher.php');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <title>ТЕСТ</title>
</head>
<body>
    <h1>ТЕСТ</h1>
</body>
</html>
