<?php

include "../connect.php";

$idFriend = $_POST['id'];
$idUser = strval($_COOKIE['id']);
$tableName = '';

if ($idUser > $idFriend) {
    $tableName = $idUser . '-' . $idFriend;
} else if ($idFriend > $idUser) {
    $tableName = $idFriend . '-' . $idUser;
}

$checkFriendListFriend = mysqli_query($connect, "SELECT * FROM `$idFriend` WHERE `friendList` = '$idUser'");
$checkFriendListUser = mysqli_query($connect, "SELECT * FROM `$idUser` WHERE `friendList` = '$idFriend'");

if (mysqli_num_rows($checkFriendListFriend) == 0 || mysqli_num_rows($checkFriendListUser) == 0) {
    $response = [
        "status" => false,
        "type" => 1,
    ];
    echo json_encode($response);
    die();

} else {

    mysqli_query($connect, "UPDATE `$idFriend` SET `chat` = 'true' WHERE `friendList` = '$idUser'");
    mysqli_query($connect, "UPDATE `$idUser` SET `chat` = 'true' WHERE `friendList` = '$idFriend'");
    mysqli_query($connect, "CREATE TABLE IF NOT EXISTS `$tableName` (`id` INT NOT NULL AUTO_INCREMENT, `from` INT, `text` VARCHAR(150), `dateTime` DATETIME, PRIMARY KEY(`id`))");

    $response = [
        "status" => true
    ];

    echo json_encode($response);

}