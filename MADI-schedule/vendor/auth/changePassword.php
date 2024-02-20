<?php

include "../schedulePro/connect.php";

$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$email = strval($_COOKIE['email']);

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

    mysqli_query($connect, "UPDATE `madiAuth` SET `password` = '$password' WHERE `email` = '$email'");

    if (empty($errorFields)) {
        setcookie('codeProof', '', -1, '/');
        setcookie('email', '', -1, '/');
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