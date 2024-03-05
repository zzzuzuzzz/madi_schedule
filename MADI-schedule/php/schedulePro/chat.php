<?php

if ($_COOKIE['user'] && !$_COOKIE["profile"]) {
    header('Location: ../scheduleLite/schedule.php');
} else if (!$_COOKIE['user'] && !$_COOKIE["profile"]) {
    header('Location: ../../index.php');
} else if ($_COOKIE['user'] && $_COOKIE["profile"]) {
    setcookie('user', '', -1, '/');
}

setcookie('msg', '', -1, '/')
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
    <link rel="stylesheet" href="../../assets/css/schedulePro/chatTeacher.css">
</head>
<body>

<?php
include "../../assets/htmlBlocks/buttons.php"
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
                <a href="addDialog.php" class="addDialog">Начать новый диалог</a>
                <?php

                include "../../vendor/schedulePro/connect.php";

                $idUser = $_COOKIE['id'];

                $friendListFromSql = mysqli_query($connect, "SELECT `friendList` FROM `$idUser` WHERE `chat` = 'true'");

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
                            <div title='" . $work ."-" . $class . "' id='" . $id . "' class='sqlResultFriends' >
                                <div class='sqlResultFriendsAvatar'>
                                    <img src=../../" . $avatar . " alt='Аватар' class='avatar'>
                                </div>
                                <div class='sqlResultFriendsFirstName'><p>" . $firstName . "</p></div>
                                <div class='sqlResultFriendsLastName'><p>" . $lastName . "</p></div>
                            </div>
                        ";
                        }
                    }
                } else {
                    echo "<p>Вы пока не добавили друга для диалога</p>";
                }
                ?>
            </div>
            <div class="chatField">
                <div class="dialogField">
                    <div class="msgField">

                    </div>
                    <form class="sendMsgField">
                        <input type="text" class="sendMsg">
                        <button class="btnSendMsg">&#10148;</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/js/schedulePro/headerButtons.js"></script>
<script>
    $('.pContact').click(function () {
        document.location.href = 'contact.php'
    })
</script>
<script>
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    let id = getCookie('id')
    let start = 0


    $(document).ready(function () {

        setInterval(loadMsg, 1000)

        function loadMsg () {

            if (getCookie('msg')) {

                $.ajax({
                    url: '../../../vendor/schedulePro/contact/viewDialog.php?start=' +start,
                    dataType: 'json',
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest)
                    },
                    success(data) {
                        // console.log(data)
                        data.forEach(item => {
                            $('.msgField').append(renderMessage(item))
                            start = item.id;
                            console.log(start);
                        })
                    }
                });
                console.log('Обновлено ...')
            } else {
                    console.log('Диалог не открыт')
                }
        }
    })

    function renderMessage(item) {
        if (item.from === id) {
            return '<div class="msgBox myMsg">' +
                `<div class="msgText"> ${item.text} </div>` +
                '</div>'
        } else {
            return '<div class="msgBox friendMsg">' +
                `<div class="msgText"> ${item.text} </div>` +
                '</div>'
        }
    }

    $('.sendMsgField').submit(function (e) {

        $.post("../../../vendor/schedulePro/contact/viewDialog.php?action=add_message", {
            message: $('.sendMsg').val(),
            user: id
        }).done (function (data) {$('.sendMsg').val('')})

        return false;
    })

    $('.sqlResultFriends').click(function (event) {
        event.preventDefault();

        let msgBox = document.querySelector('.msgBox')
        if (msgBox !== null) {
            $('.msgBox').remove()
            start = 0
        }
        let id = this.id
        $('.dialog').removeClass('dialog')
        document.getElementById(id).classList.add('dialog')

        $.ajax({
            url: '../../../vendor/schedulePro/contact/viewDialogFromTabBar.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success (data) {

                if (data.status) {
                    console.log('Выбран диалог')
                } else {
                    console.log('Произошла неизвестная ошибка, повторите попытку позже.')
                }
            }
        });
    });
</script>
</body>
</html>