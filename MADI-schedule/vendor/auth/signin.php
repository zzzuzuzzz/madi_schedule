<?php

    include "../blocks/connect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $true = 'True';

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

                setcookie('profileTeacher', $true, time() + 60 * 60 * 24 * 30 * 12, '/');
                setcookie('class', $select, time() + 60 * 60 * 24 * 30 * 12, '/');

                $response = [
                    "type" => 2,
                    "status" => true
                ];


            } else if ($user['work'] == 'student') {


//                НУЖНО СДЕЛАТЬ ПЕЕРЕВОДЧИК НАЗВАНИЯ ГРУППЫ С sql НА PHP
                $select = $user['class'];
                include "../blocks/switchClassTeacher.php";
//                НУЖНО СДЕЛАТЬ ПЕЕРЕВОДЧИК НАЗВАНИЯ ГРУППЫ С sql НА PHP

                setcookie('profileStudent', $true, time()+86400*30*12, '/');
                setcookie('class', $select, time()+86400*30*12, '/');

                $response = [
                    "type" => 3,
                    "status" => true
                ];
            }

            setcookie('firstName', $user['firstName'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('lastName', $user['lastName'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('email', $user['email'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('language', $user['language'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('background', $user['background'], time() + 60 * 60 * 24 * 30 * 12, '/');

            echo json_encode($response);
        }

    } else {
        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];

        echo json_encode($response);
    }