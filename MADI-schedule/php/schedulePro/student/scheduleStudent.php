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
    <title>Расписание</title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
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

    <div class="container">
        <div class="calendarBlock">
            <div id="calendar"></div>
        </div>
    </div>


<!--    <form>-->
<!---->
<!--    <a href="../../vendor/schedulePro/logout.php" class="logout">Выход</a>-->
<!--    </form>-->
    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../../assets/js/air-datepicker.js"></script>
    <script>
        new AirDatepicker('#calendar', {
            inline: true,
            buttons: ('today'),
            selectedDates: [new Date()],
            onSelect (formattedDate, date) {
                alert('hello')

            }
        })
    </script>
    <script src="../../../assets/js/schedulePro/student/headerStudent.js"></script>
</body>
</html>