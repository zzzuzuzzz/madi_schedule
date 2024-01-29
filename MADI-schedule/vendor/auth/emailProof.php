<?php
session_start();

//    include ('../connect.php');

$connect = mysqli_connect('192.168.1.74', 'admin', 'ijhyu13113', 'madi');

if (!$connect) {
    die ("Error connect to DataBase");
}

$email = strval($_SESSION['emailProof']['email']);

mysqli_query($connect, "UPDATE `madiAuth` SET `emailProof` = True WHERE `email` = '$email'");

$response = [
    "status" => true
];

unset($_SESSION['emailProof']);

echo json_encode($response);