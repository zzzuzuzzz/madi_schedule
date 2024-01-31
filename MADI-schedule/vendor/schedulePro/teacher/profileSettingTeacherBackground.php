<?php
session_start();

include "../../blocks/connect.php";

$select = $_POST['select'];

$errorFields = [];

if ($select === '') {
    $errorFields[] = 'selectBackground';
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
    $class = strval($_SESSION['profileTeacher']['class']);
    $language = strval($_SESSION['profileTeacher']['language']);


    mysqli_query($connect, "UPDATE `madiAuth` SET `background`= '$select' WHERE `email` = '$email'");

    $_SESSION['profileTeacher'] = [
        'class' => $class,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'language' => $language,
        'background' => $select
    ];
    $response = [
        "status" => true
    ];
}

echo json_encode($response);