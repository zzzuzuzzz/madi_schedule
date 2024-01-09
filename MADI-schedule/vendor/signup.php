<?php
    session_start();
    $connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

    if (!$connect) {
        die ("Error connect to DataBase");
    }
//    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $fullName = $_POST['fullName'];
    $select = $_POST['select'];

    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `email` = '$email'");
    if (mysqli_num_rows($checkUser) > 0) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Такой пользаватель уже есть",
            "fields" => ['email']
        ];
        echo json_encode($response);
        die();
    }

    $errorFields = [];

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorFields[] = 'email';
    }
    if ($password === '') {
        $errorFields[] = 'password';
    }
    if ($password_confirm === '') {
        $errorFields[] = 'password_confirm';
    }
    if ($fullName === '') {
        $errorFields[] = 'fullName';
    }
    if ($select === '') {
        $errorFields[] = 'select';
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

    if ($password === $password_confirm) {
        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `madiAuth` (`email`, `password`, `work`, `fullName`, `class`) VALUES ('$email', '$password', '$select', '$fullName', NULL)");

        if (empty($errorFields)) {
            $response = [
                "status" => true,
                "message" => "Вы успешно зарегестрировались",
            ];
            echo json_encode($response);
        }


    } else {
        if (!empty($errorFields)) {
            $response = [
                "status" => false,
                "message" => "Пароли не совпадают",
            ];
            echo json_encode($response);
        }
    }