<?php

include "../blocks/connect.php";

$email = $_COOKIE['emailProof'];

mysqli_query($connect, "UPDATE `madiAuth` SET `emailProof` = 'true' WHERE `email` = '$email'");

$response = [
    "status" => true
];

setcookie('emailProof', '', -1, '/');

echo json_encode($response);