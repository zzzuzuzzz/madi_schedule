<?php
session_start();
$connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

if (!$connect) {
    die ("Error connect to DataBase");
}

$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$email = $_SESSION['codeFromEmail']['email'];

$errorFields = [];
$errorPasswordLen =[];

if ($password === '') {
    $errorFields[] = 'password';
} else if (strlen($password) < 8) {
    $errorPasswordLen[] = 'password';
}

if ($passwordConfirm === '') {
    $errorFields[] = 'passwordConfirm';
} else if (strlen($passwordConfirm) < 8) {
    $errorPasswordLen[] = 'passwordConfirm';
}

if (!empty($errorFields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверте правильность полей",
        "fields" => $errorFields
    ];
    echo json_encode($response);
    die();
}

if (!empty($errorPasswordLen)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Пароль слишком короткий",
        "fields" => $errorPasswordLen
    ];
    echo json_encode($response);
    die();
}

if ($password === $passwordConfirm) {
    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `madiAuth` `password` VALUE '$password' WHERE `email` = '$email'");

    if (empty($errorFields)) {
        unset($_SESSION['codeFromEmail']);
        $response = [
            "status" => true,
            "message" => "Пароль успешно изменен",
        ];
        echo json_encode($response);
    }

} else {
    if (empty($errorFields)) {
        $response = [
            "status" => false,
            "message" => "Пароли не совпадают",
        ];
        echo json_encode($response);
    }
}