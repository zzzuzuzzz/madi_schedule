<?php

include "../connect.php";

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

    $email = strval($_COOKIE['email']);

    mysqli_query($connect, "UPDATE `madiAuth` SET `class`= '$select' WHERE `email` = '$email'");

    if (strval($_COOKIE['work']) == 'teacher') {
        include "switchClassTeacher.php";
        setcookie('class', $select, time()+86400*30*12, '/');
    } else if ((strval($_COOKIE['work']) == 'student')){
        include "switchClassStudent.php";
        setcookie('class', $select, time()+86400*30*12, '/');
    }

    $response = [
        "status" => true
    ];
}

echo json_encode($response);