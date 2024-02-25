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
    <link rel="stylesheet" href="../../assets/css/headerWebVer.css">
    <link rel="stylesheet" href="../../assets/css/schedulePro/scheduleResult.css">
    <?php
    if (strval($_COOKIE['background']) === "white") {
        include "../../assets/htmlBlocks/whiteCSS.html";
    } else if (strval($_COOKIE['background']) === "black") {
        include "../../assets/htmlBlocks/blackCSS.html";
    }
    ?>
</head>
<body>

<?php
include "../../assets/htmlBlocks/buttons.php"
?>

<div class="container">
    <div class="calendarBlock">
        <div id="calendar"></div>
    </div>
</div>
<a href="addSchedule.php">Добавить занятие</a>

<div class="containerWithSqlResult" id="container">
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
                        <div class='sqlResultLessonName'>" . $lessonName . "</div>
                        <div class='sqlResultTeacher'>" . $teacher . "</div>
                        <div class='sqlResultTime'>" . $time . "</div>
                        <div class='sqlResultLessonType'>" . $lessonType . "</div>
                        <div class='sqlResultBuilding'>" . $building . "</div>
                        <div class='sqlResultAudience'>" . $audience . "</div>
                    </div>
                    ";
                }
            }
        }

        setcookie('scheduleViewDate', '', -1, '/');
        ?>
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