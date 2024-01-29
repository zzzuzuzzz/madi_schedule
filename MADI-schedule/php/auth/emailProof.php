<?php
    session_start();

    if (!$_SESSION['user'] && $_SESSION['profileStudent']) {
        header('Location: ../schedulePro/student/scheduleStudent.php');
    } else if (!$_SESSION['user'] && $_SESSION['profileTeacher']) {
        header('Location: ../schedulePro/teacher/scheduleTeacher.php');
    } else if ($_SESSION['user'] && $_SESSION['profileStudent']) {
        unset($_SESSION['user']);
        header('Location: ../schedulePro/student/scheduleStudent.php');
    } else if ($_SESSION['user'] && $_SESSION['profileTeacher']) {
        unset($_SESSION['user']);
        header('Location: ../schedulePro/teacher/scheduleTeacher.php');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подтверждение почты</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

<div class="container">
    <form>
        <p>Благодарим Вас за регистрацию. Вам осталось только подтвердить почту!</p>
        <button type="submit" class="btnProofEmail">Войти</button>
    </form>
</div>


<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/auth/emailProof.js"></script>
</body>
</html>