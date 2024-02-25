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
    <title>Задания</title>
    <link rel="stylesheet" href="../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../assets/css/headerWebVer.css">
    <link rel="stylesheet" href="../../assets/css/schedulePro/taskResult.css">
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
<a href="addTask.php">Добавить задание</a>

<div class="containerWithSqlResult" id="container">
    <div class="result">
        <?php

        include "../../vendor/schedulePro/connect.php";

        $dbName = strval($_COOKIE['task']);
        if ($_COOKIE['taskViewDate']) {
            $date = strval($_COOKIE['taskViewDate']);
        } else {
            $date = date('Y-m-d');
        }

        $taskFromSql = mysqli_query($connect, "SELECT * FROM `$dbName`");

        if (mysqli_num_rows($taskFromSql) > 0) {

            $numPost = intval(mysqli_num_rows($taskFromSql));

            for ($numPost; $numPost > 0; $numPost--)
            {
                $InfoSql = mysqli_fetch_assoc($taskFromSql);
                $sqlDate = strval($InfoSql['date']);

                if ($sqlDate !== $date) {
                    continue;
                } else {
                    $title = strval($InfoSql['title']);
                    $text = strval($InfoSql['text']);

                    echo "
                    <div class='sqlResult'>
                        <div class='sqlResultTitle'>" . $title . "</div>
                        <div class='sqlResultText'>" . $text . "</div>
                    </div>
                    ";
                }
            }
        }

        setcookie('taskViewDate', '', -1, '/');
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
            url: '../../vendor/schedulePro/task/viewTask.php',
            type: 'POST',
            dataType: 'json',
            data: {
                date: date
            },
            success(data) {
                if (data.status) {
                    document.location.href = 'task.php'
                } else {
                    if (data.type === 1) {
                        console.log('Неизвестная ошибка')
                    }
                }
            }
        })
    }

    let today = <?php
        if ($_COOKIE['taskViewDate']) {
            $date = strval($_COOKIE['taskViewDate']);
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