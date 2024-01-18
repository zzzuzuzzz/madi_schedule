<?php
    session_start();

    if (!$_SESSION['user']) {
        header('Location: ../auth.php');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ваш профиль</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <form>
        <h2><?= $_SESSION['user']['fullName'] ?></h2>
        <h3><?= $_SESSION['user']['email'] ?></h3>
        <a href="../vendor/schedulePro/logout.php" class="logout">Выход</a>
    </form>
</body>
</html>