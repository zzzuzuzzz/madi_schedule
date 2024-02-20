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
    <link rel="stylesheet" href="../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../assets/css/headerWebVer.css">
    <?php
    if (strval($_COOKIE['background']) === "white") {
        include "../../assets/htmlBlocks/whiteCSS.html";
    } else if (strval($_COOKIE['background']) === "black") {
        include "../../assets/htmlBlocks/blackCSS.html";
    }
    ?>
    <link rel="stylesheet" href="../../assets/css/schedulePro/contactTeacher.css">
</head>
<body>

<?php
include "../../assets/htmlBlocks/buttons.php"
?>

<div class="container">
    <div class="containerWithChatAndContactInAddFriend">
        <div class="exit">
            <a href="contact.php">Вернутся назад</a>
        </div>
        <div class="containerWithContact">
            <div class="foundField">
                <form class="found">
                    <label>
                        <input type="text" class="inputFirstName" name="firstName" placeholder="Имя">
                    </label>
                    <label>
                        <input type="text" class="inputLastName" name="lastName" placeholder="Фамилия">
                    </label>
                    <button class="foundButton">&#10145</button>
                </form>
                <div class="foundResult">
                    <p class="msg none">Lorem ipsum dolor sit amet.</p>
                    <?php
                    $val = 1;
                    $str = strval($val);

                    while ($_COOKIE['sql' . $str]) {
                        $get_cook = unserialize($_COOKIE['sql' . $str]);

                        $sqlFirstName = strval($get_cook['cook_one']);
                        $sqlLastName = strval($get_cook['cook_two']);
                        $sqlAvatar = strval($get_cook['cook_three']);
                        $sqlId = strval($get_cook['cook_four']);
                        $sqlWork = strval($get_cook['cook_five']);
                        $sqlClass = strval($get_cook['cook_six']);

                        if ($sqlAvatar == NULL) {
                            $sqlAvatar = 'assets/img/svg/iconProfile.svg';
                        }
                        if ($sqlClass == NULL) {
                            if ($sqlWork == 'teacher') {
                                $sqlClass = 'Факультет не определен';
                            } else if ($sqlWork == 'student') {
                                $sqlClass = 'Группа не определена';
                            }
                        } else {
                            if ($sqlWork == 'teacher') {
                                $select = $sqlClass;
                                include "../../vendor/blocks/switchClassTeacher.php";
                                $sqlClass = $select;
                            } else if ($sqlWork == 'student') {
                                $select = $sqlClass;
                                include "../../vendor/blocks/switchClassStudent.php";
                                $sqlClass = $select;
                            }
                        }
                        if ($_COOKIE['language'] == 'ru') {
                            if ($sqlWork == 'teacher') {
                                $sqlWork = 'Преподователь';
                            } else if ($sqlWork == 'student') {
                                $sqlWork = 'Студент';
                            }
                        }
                        echo "
                            <div class='sqlResult'>
                                <div class='sqlResultAvatar'>
                                    <img src=../../" . $sqlAvatar . " alt='Аватар' class='avatar'>
                                </div>
                                <div class='sqlResultFirstName'><p>" . $sqlFirstName . "</p></div>
                                <div class='sqlResultLastName'><p>" . $sqlLastName . "</p></div>
                                <div class='sqlResultWork'><p>" . $sqlWork . "</p></div>
                                <div class='sqlResultClass'><p>" . $sqlClass . "</p></div>
                                <div class='sqlResultButtonToFriends' id='" . $sqlId . "'><p>&#10133</p></div>
                            </div>
                        ";
                        setcookie('sql' . $str, '', -1, '/');
                        $val++;
                        $str = strval($val);
                        setcookie('sql' . $str, '', -1, '/');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/schedulePro/headerButtons.js"></script>
<script src="../../assets/js/schedulePro/contact.js"></script>
<script src="../../assets/js/schedulePro/connectToFriend.js"></script>
</body>
</html>