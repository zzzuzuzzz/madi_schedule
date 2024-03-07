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
    <title>Расписание</title>
    <link rel="stylesheet" href="../../assets/css/air-datepicker.css">
    <?php
    if (strval($_COOKIE['background']) === "white") {
        echo '<link rel="stylesheet" href="../../assets/css/schedulePro/schedule/scheduleWhite.css">';
    } else if (strval($_COOKIE['background']) === "black") {
        echo '<link rel="stylesheet" href="../../assets/css/schedulePro/schedule/scheduleBlack.css">';
    }
    ?>
</head>
<body>

<div class="header" id="calendar">
    <button class="schedule btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconScheduleBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconScheduleWhite.svg" ';
            }
            ?>
                alt="Иконка расписания">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Расписание";
            } else if ($language === 'en') {
                echo "Schedule";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
    <button class="task btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconTaskBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconTaskWhite.svg" ';
            }
            ?>
                alt="Иконка заданий">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Задания";
            } else if ($language === 'en') {
                echo "Task";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>

    <button class="chat btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconChatBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconChatWhite.svg" ';
            }
            ?>
                alt="Иконка чата">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Чат и контакты";
            } else if ($language === 'en') {
                echo "Chat and contact";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
    <button class="profile btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconProfileBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconProfileWhite.svg" ';
            }
            ?>
                alt="Иконка профиля">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Ваш профиль";
            } else if ($language === 'en') {
                echo "Your profile";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
</div>

<div class="containerInBody">
    <div class="containerWithSqlResult" id="container">
        <a href="addSchedule.php" class="addSchedule">Добавить занятие</a>
        <div class="result">
            <?php

            include "../../vendor/schedulePro/connect.php";

            $dbName = strval($_COOKIE['schedule']);
            if ($_COOKIE['scheduleViewDate']) {
                $date = strval($_COOKIE['scheduleViewDate']);
            } else {
                $date = date('Y-m-d');
            }

            $scheduleFromSql = mysqli_query($connect, "SELECT * FROM `$dbName`");

            if (mysqli_num_rows($scheduleFromSql) > 0) {

                $numPost = intval(mysqli_num_rows($scheduleFromSql));

                for ($numPost; $numPost > 0; $numPost--)
                {
                    $InfoSql = mysqli_fetch_assoc($scheduleFromSql);
                    $sqlDate = strval($InfoSql['date']);

                    if ($sqlDate !== $date) {
                        continue;
                    } else {
                        $lessonName = strval($InfoSql['lessonName']);
                        $lessonType = strval($InfoSql['lessonType']);
                        $building = strval($InfoSql['building']);
                        $audience = strval($InfoSql['audience']);
                        $teacher = strval($InfoSql['teacherName']);
                        $time = substr(strval($InfoSql['time']), 0, -3);

                        echo "
                    <div class='sqlResult'>
                        <div class='sqlResultBlock'>
                            <p class='sqlResultLessonName'>" . $lessonName . "</p>
                            <p class='sqlResultTeacher'>" . $teacher . "</p>
                            <p class='sqlResultTime'>" . $time . "</p>
                            <p class='sqlResultLessonType'>" . $lessonType . "</p>
                            <p class='sqlResultBuilding'>" . $building . "</p>
                            <p class='sqlResultAudience'>" . $audience . "</p>
                        </div>
                    </div>
                    ";
                    }
                }
            }

            setcookie('scheduleViewDate', '', -1, '/');
            ?>
        </div>
    </div>
</div>

<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/air-datepicker.js"></script>
<script>
    const field = document.getElementById('container')

    function ajax(date) {

        const links = document.querySelectorAll('.sqlResult');
        links.forEach(link => link.parentNode.removeChild(link));

        $.ajax({
            url: '../../vendor/schedulePro/schedule/viewSchedule.php',
            type: 'POST',
            dataType: 'json',
            data: {
                date: date
            },
            success(data) {
                if (data.status) {
                    document.location.href = 'schedule.php'
                } else {
                    if (data.type === 1) {
                        console.log('Неизвестная ошибка')
                    }
                }
            }
        })
    }

    let today = <?php
        if ($_COOKIE['scheduleViewDate']) {
            $date = strval($_COOKIE['scheduleViewDate']);
            echo "'" . $date . "'";
        } else {
            echo 'new Date()';
        }
        ?>;

    new AirDatepicker('#calendar', {
        inline: true,
        buttons: ('today'),
        dateFormat: 'yyyy-MM-dd',
        selectedDates: [today],
        onSelect (formattedDate) {
            let date = formattedDate['formattedDate'];
            ajax(date)
        }
    })
</script>
<script src="../../assets/js/schedulePro/headerButtons.js"></script>
</body>
</html>