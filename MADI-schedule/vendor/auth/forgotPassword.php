<?php
session_start();

$connect = mysqli_connect('192.168.1.74', 'admin', 'ijhyu13113', 'madi');

if (!$connect) {
    die ("Error connect to DataBase");
}

$email = $_POST['email'];

$errorFields = [];

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorFields[] = 'email';
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

$checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `email` = '$email'");

if (mysqli_num_rows($checkUser) > 0) {

    $codeProof = rand(1000, 10000);

    $_SESSION['codeFromEmail'] = [
        'codeProof' => $codeProof,
        'email' => $email
    ];

    mail($email, 'Восстановление пароля', "Добрый день! Введите в поле на нашем сайте следующие число для востановления пароля! {$codeProof}");

    $response = [
        "status" => true
    ];

    echo json_encode($response);


} else {
    $response = [
        "status" => false,
        "message" => 'Такого пользователя не существует'
    ];

    echo json_encode($response);
}