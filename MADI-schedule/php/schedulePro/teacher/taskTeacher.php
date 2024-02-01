<?php
session_start();

if ($_SESSION['user'] && !$_SESSION['profileTeacher']) {
    header('Location: ../scheduleLite/scheduleTeacher.php');
} else if (!$_SESSION['user'] && !$_SESSION['profileTeacher']) {
    header('Location: ../../../index.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задания</title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
    <?php
    if (strval($_SESSION['profileTeacher']['background']) === "white") {
        include "../../../assets/htmlBlocks/whiteCSS.html";
    } else if (strval($_SESSION['profileTeacher']['background']) === "black") {
        include "../../../assets/htmlBlocks/blackCSS.html";
    }
    ?>
</head>
<body>

<?php
include "../../../assets/htmlBlocks/buttons.php"
?>

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
<script src="../../../assets/js/schedulePro/teacher/headerTeacher.js"></script>
</body>
</html>