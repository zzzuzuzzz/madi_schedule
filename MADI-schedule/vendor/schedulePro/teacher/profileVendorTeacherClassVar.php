<?php
session_start();

//    include ('../connect.php');

$connect = mysqli_connect('192.168.1.74', 'admin', 'ijhyu13113', 'madi');

if (!$connect) {
    die ("Error connect to DataBase");
}

$select = $_POST['select'];

$errorFields = [];

if ($select === '') {
    $errorFields[] = 'select';
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

    mysqli_query($connect, "UPDATE `madiAuth` SET `class`= '$select' WHERE `email` = '$email'");

    $_SESSION['profileTeacher'] = [
        'class' => $select
    ];
    $response = [
        "status" => true
    ];
}

echo json_encode($response);