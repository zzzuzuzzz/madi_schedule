<?php
session_start();

if ($_SESSION['user'] && !$_SESSION['profileStudent']) {
    header('Location: ../scheduleLite/scheduleTeacher.php');
} else if (!$_SESSION['user'] && !$_SESSION['profileStudent']) {
    header('Location: ../../../index.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ваш профиль</title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
    <link rel="stylesheet" href="../../../assets/css/schedulePro/profile.css">
</head>
<body>

    <div class="header">
        <button class="schedule btnHeader">
            <img src="../../../assets/img/svg/iconSchedule.svg" alt="Иконка расписания">
            <p>Расписание</p>
        </button>
        <button class="task btnHeader">
            <img src="../../../assets/img/svg/iconTask.svg" alt="Иконка заданий">
            <p>Задания</p>
        </button>
        <button class="logo btnHeader">
            <img src="../../../assets/img/svg/iconMadi.svg" alt="Логотип МАДИ" class="madiLogo">
            <p>Расписание МАДИ</p>
        </button>
        <button class="chat btnHeader">
            <img src="../../../assets/img/svg/iconChat.svg" alt="Иконка чата">
            <p>Чат и контакты</p>
        </button>
        <button class="profile btnHeader">
            <img src="../../../assets/img/svg/iconProfile.svg" alt="Иконка профиля">
            <p>Ваш профиль</p>
        </button>
    </div>

    <div class="containerWithProfileInfoAndSetting">
        <div class="profileInfo">
            <img src="../../../assets/img/svg/iconProfile.svg" alt="Автарка" class="avatar">
            <p class="lastName">Фамилия</p>
            <p class="firstName">Имя</p>
            <p>Ваша почта</p>
            <p class="email">Mail_mail@mail.ru</p>
            <p>Ваша группа/факультет</p>
            <form>

            </form>
            <form>
                <a href="../../../vendor/schedulePro/logout.php" class="logout">Выход</a>
            </form>
        </div>
        <div class="setting">
            <p>настройки</p>
        </div>
    </div>

<script src="../../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../../assets/js/schedulePro/student/headerStudent.js"></script>
</body>
</html>