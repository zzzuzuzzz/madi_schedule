<?php
    session_start();
    $connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

    if (!$connect) {
        die ("Error connect to DataBase");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $errorFields = [];

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorFields[] = 'email';
    }
    if ($password === '') {
        $errorFields[] = 'password';
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
    $password = md5($password);

    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `email` = '$email' AND `password` = '$password'");

    if (mysqli_num_rows($checkUser) > 0) {

        $user = mysqli_fetch_assoc($checkUser);

        $_SESSION['profile'] = [
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'email' => $user['email']
        ];

        $response = [
            "status" => true
        ];

        echo json_encode($response);


    } else {
        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];

        echo json_encode($response);
    }