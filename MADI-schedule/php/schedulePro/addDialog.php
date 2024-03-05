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
    <link rel="stylesheet" href="../../assets/css/schedulePro/addDialog.css">
</head>
<body>

<?php
include "../../assets/htmlBlocks/buttons.php"
?>

<div class="container">
        <div class="containerWithContact">
                <?php

                include "../../vendor/schedulePro/connect.php";

                $idUser = $_COOKIE['id'];
                $friendListLocal = $_COOKIE['friendListLocal'];

                $friendListFromSql = mysqli_query($connect, "SELECT `friendList` FROM `$idUser`");

                if (mysqli_num_rows($friendListFromSql) > 0) {

                    $numPost = intval(mysqli_num_rows($friendListFromSql));

                    for ($numPost; $numPost > 0; $numPost--)
                    {
                        $checkIdFromSql = mysqli_fetch_assoc($friendListFromSql);
                        $checkId = strval($checkIdFromSql['friendList']);
                        if ($checkId == NULL) {
                            continue;
                        } else {
                            $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `id` = '$checkId'");

                            $user = mysqli_fetch_assoc($checkUser);

                            $firstName = strval($user['firstName']);
                            $lastName = strval($user['lastName']);
                            $avatar = strval($user['avatar']);
                            $id = strval($user['id']);
                            $work = strval($user['work']);
                            $class = strval($user['class']);

                            if ($avatar == NULL) {
                                $avatar = 'assets/img/svg/iconProfile.svg';
                            }
                            if ($class == NULL) {
                                if ($work == 'teacher') {
                                    $class = 'Факультет не определен';
                                } else if ($work == 'student') {
                                    $class = 'Группа не определена';
                                }
                            } else {
                                if ($work == 'teacher') {
                                    $select = $class;
                                    include "../../vendor/schedulePro/profile/switchClassTeacher.php";
                                    $class = $select;
                                } else if ($work == 'student') {
                                    $select = $class;
                                    include "../../vendor/schedulePro/profile/switchClassStudent.php";
                                    $class = $select;
                                }
                            }
                            if ($_COOKIE['language'] == 'ru') {
                                if ($work == 'teacher') {
                                    $work = 'Преподователь';
                                } else if ($work == 'student') {
                                    $work = 'Студент';
                                }
                            }
                            echo "
                            <div class='sqlResultFriends' id='" . $id . "'>
                                <div class='sqlResultFriendsAvatar'>
                                    <img src=../../" . $avatar . " alt='Аватар' class='avatar'>
                                </div>
                                <div class='sqlResultFriendsFirstName'><p>" . $firstName . "</p></div>
                                <div class='sqlResultFriendsLastName'><p>" . $lastName . "</p></div>
                                <div class='sqlResultFriendsWork'><p>" . $work . "</p></div>
                                <div class='sqlResultFriendsClass'><p>" . $class . "</p></div>
                            </div>
                        ";
                        }
                    }
                }
                ?>
        </div>
</div>

<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/schedulePro/headerButtons.js"></script>
<script src="../../assets/js/schedulePro/addDialog.js"></script>
</body>
</html>