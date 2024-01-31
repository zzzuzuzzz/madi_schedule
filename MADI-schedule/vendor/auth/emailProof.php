<?php
session_start();

include "../blocks/connect.php";

$email = strval($_SESSION['emailProof']['email']);

mysqli_query($connect, "UPDATE `madiAuth` SET `emailProof` = 'true' WHERE `email` = '$email'");

$response = [
    "status" => true
];

unset($_SESSION['emailProof']);

echo json_encode($response);