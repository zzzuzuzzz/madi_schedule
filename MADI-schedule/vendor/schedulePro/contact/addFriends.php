<?php

include "../connect.php";

$idFriend = $_POST['id'];
$idUser = strval($_COOKIE['id']);

$checkFromList = mysqli_query($connect, "SELECT * FROM `$idUser` WHERE `fromList` = '$idFriend'");
$checkToList = mysqli_query($connect, "SELECT * FROM `$idFriend` WHERE `toList` = '$idUser'");
$checkFriendListFriend = mysqli_query($connect, "SELECT * FROM `$idFriend` WHERE `friendList` = '$idUser'");
$checkFriendListUser = mysqli_query($connect, "SELECT * FROM `$idUser` WHERE `friendList` = '$idFriend'");

if (mysqli_num_rows($checkFromList) == NULL || mysqli_num_rows($checkToList) == NULL) {
    $response = [
        "status" => false,
        "type" => 1,
    ];
    echo json_encode($response);
    die();

} else if (mysqli_num_rows($checkFriendListFriend) > 0 || mysqli_num_rows($checkFriendListUser) > 0) {
    $response = [
        "status" => false,
        "type" => 2,
    ];
    echo json_encode($response);
    die();

} else {

    mysqli_query($connect, "UPDATE `$idFriend` SET `friendList` = '$idUser', `toList` = NULL, `fromList` = NULL, `chat` = 'false' WHERE `toList` = '$idUser'");
    mysqli_query($connect, "UPDATE `$idUser` SET `friendList` = '$idFriend', `toList` = NULL, `fromList` = NULL, `chat` = 'false' WHERE `fromList` = '$idFriend'");

    $response = [
        "status" => true
    ];

    echo json_encode($response);

}