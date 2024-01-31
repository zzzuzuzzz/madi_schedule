<?php
    session_start();

    include "../blocks/connect.php";

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

        if (strval($user['emailProof']) === "false") {
            $response = [
                "status" => false,
                "message" => 'Вы не подтвердили почту. Пожалуйста, перейдите в Ваш почтовый ящик и подтвердите его'
            ];

            echo json_encode($response);
        } else {
            if ($user['work'] == 'teacher') {

                $select = $user['class'];
                include "../blocks/switchClassTeacher.php";

                $_SESSION['profileTeacher'] = [
                    'firstName' => $user['firstName'],
                    'lastName' => $user['lastName'],
                    'email' => $user['email'],
                    'class' => $select,
                    'language' => $user['language'],
                    'background' => $user['background']
                ];
                $response = [
                    "type" => 2,
                    "status" => true
                ];


            } else if ($user['work'] == 'student') {
                $_SESSION['profileStudent'] = [
                    'firstName' => $user['firstName'],
                    'lastName' => $user['lastName'],
                    'email' => $user['email'],
                    'class' => $user['class']
                ];
                $response = [
                    "type" => 3,
                    "status" => true
                ];
            }

            echo json_encode($response);
        }

    } else {
        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];

        echo json_encode($response);
    }