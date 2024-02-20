<?php

include "../connect.php";

$error_fields = [];

if (!$_FILES['avatar']) {
    $error_fields[] = 'avatar';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

$path = 'uploads/' . time() . $_FILES['avatar']['name'];
if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $path)) {
    $response = [
        "status" => false,
        "type" => 2,
        "message" => "Ошибка при загрузке аватарки",
    ];
    echo json_encode($response);
}

$email = strval($_COOKIE['email']);
$lastPhoto = strval($_COOKIE['avatar']);
unlink("../../" . $lastPhoto);

mysqli_query($connect, "UPDATE `madiAuth` SET `avatar`= '$path' WHERE `email` = '$email'");

setcookie('avatar', $path, time() + 60 * 60 * 24 * 30 * 12, '/');

$response = [
    "status" => true,
    "message" => "Регистрация прошла успешно!",
];
echo json_encode($response);