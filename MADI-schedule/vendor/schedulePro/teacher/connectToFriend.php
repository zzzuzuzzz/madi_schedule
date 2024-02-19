<?php

include "../../blocks/connect.php";

$idFriend = $_POST['id'];
$idUser = strval($_COOKIE['id']);

$checkFromList = mysqli_query($connect, "SELECT * FROM `$idFriend` WHERE `fromList` = '$idUser'");
$checkToList = mysqli_query($connect, "SELECT * FROM `$idUser` WHERE `toList` = '$idFriend'");
$checkFriendListFriend = mysqli_query($connect, "SELECT * FROM `$idFriend` WHERE `friendList` = '$idUser'");
$checkFriendListUser = mysqli_query($connect, "SELECT * FROM `$idUser` WHERE `friendList` = '$idFriend'");

if (mysqli_num_rows($checkFromList) > 0 || mysqli_num_rows($checkToList) > 0) {
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

    mysqli_query($connect, "INSERT INTO `$idFriend` (`friendList`, `toList`, `fromList`) VALUES (NULL, NULL, '$idUser')");
    mysqli_query($connect, "INSERT INTO `$idUser` (`friendList`, `toList`, `fromList`) VALUES (NULL, '$idFriend', NULL)");

    $response = [
        "status" => true
    ];

    echo json_encode($response);

}