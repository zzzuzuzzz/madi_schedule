<?php
    session_start();

    if (!$_SESSION['user'] && !$_SESSION['profile']) {
        header('Location: ../../index.php');
    } else if (!$_SESSION['user'] && $_SESSION['profile']) {
        header('Location: ../schedulePro/profile.php');
    } else if ($_SESSION['user'] && !$_SESSION['profile']) {
        header('Location: profile.php');
    } else if ($_SESSION['user'] && $_SESSION['profile']) {
        unset($_SESSION['user']);
        header('Location: ../schedulePro/profile.php');
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
