<?php
session_start();

include "../../blocks/connect.php";

$select = $_POST['select'];

$errorFields = [];

if ($select === '') {
    $errorFields[] = 'selectClass';
}

if (!empty($errorFields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Вы не выбрали подходящий Вам вариант",
        "fields" => $errorFields
    ];
    echo json_encode($response);
    die();

} else if (empty($errorFields)) {

    $email = strval($_SESSION['profileTeacher']['email']);
    $firstName = strval($_SESSION['profileTeacher']['firstName']);
    $lastName = strval($_SESSION['profileTeacher']['lastName']);
    $language = strval($_SESSION['profileTeacher']['language']);
    $background = strval($_SESSION['profileTeacher']['background']);


    mysqli_query($connect, "UPDATE `madiAuth` SET `class`= '$select' WHERE `email` = '$email'");

    include "../../blocks/switchClassTeacher.php";

    $_SESSION['profileTeacher'] = [
        'class' => $select,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'language' => $language,
        'background' => $background
    ];
    $response = [
        "status" => true
    ];
}

echo json_encode($response);