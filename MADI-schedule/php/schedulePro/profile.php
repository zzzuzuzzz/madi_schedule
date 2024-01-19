<?php
    session_start();

    if ($_SESSION['user'] && !$_SESSION['profile']) {
        header('Location: ../scheduleLite/scheduleStudent.php');
    } else if (!$_SESSION['user'] && !$_SESSION['profile']) {
        header('Location: ../../index.php');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ваш профиль</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <form>
        <h2><?= $_SESSION['profile']['firstName'] ?></h2>
        <h2><?= $_SESSION['profile']['lastName'] ?></h2>
        <h3><?= $_SESSION['profile']['email'] ?></h3>
        <a href="../../vendor/schedulePro/logout.php" class="logout">Выход</a>
    </form>
</body>
</html>