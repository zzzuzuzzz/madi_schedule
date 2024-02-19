<?php

if ($_COOKIE['user'] && !$_COOKIE["profileTeacher"]) {
    header('Location: ../../scheduleLite/schedule.php');
} else if (!$_COOKIE['user'] && !$_COOKIE["profileTeacher"] && !$_COOKIE['profileStudent']) {
    header('Location: ../../../index.php');
} else if (!$_COOKIE['user'] && !$_COOKIE["profileTeacher"] && $_COOKIE['profileStudent']) {
    header('Location: ../student/scheduleStudent.php');
} else if ($_COOKIE['user'] && $_COOKIE["profileTeacher"]) {
    setcookie('user', '', -1, '/');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Чат и контакты</title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
    <?php
    if (strval($_COOKIE['background']) === "white") {
        include "../../../assets/htmlBlocks/whiteCSS.html";
    } else if (strval($_COOKIE['background']) === "black") {
        include "../../../assets/htmlBlocks/blackCSS.html";
    }
    ?>
    <link rel="stylesheet" href="../../../assets/css/schedulePro/chatTeacher.css">
</head>
<body>

<?php
    include "../../../assets/htmlBlocks/buttons.php"
?>

<div class="container">
    <div class="containerWithChatAndContact">
        <div class="selector">
            <div class="chatSelect">
                <p class="pInContainer pChat">Чаты</p>
            </div>
            <div class="contactSelect">
                <p class="pInContainer pContact">Контакты</p>
            </div>
        </div>
        <div class="containerWithFriendsAndChat">
            <div class="friendsField">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, doloribus?
            </div>
            <div class="chatField">
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, ex?
            </div>
        </div>
    </div>
</div>

<script src="../../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../../assets/js/schedulePro/teacher/headerTeacher.js"></script>
<script src="../../../assets/js/schedulePro/teacher/chatTeacher.js"></script>
</body>
</html>