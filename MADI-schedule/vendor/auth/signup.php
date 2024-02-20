<?php

include "../schedulePro/connect.php";

//    Получение из HTML формы данных и запись в переменные
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $select = $_POST['select'];
    $emailProof = "false";
    $language = "ru";
    $background = "white";

//    Проверка на сущетсвование пользователя
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
    $errorPasswordLen =[];

//    Обработка ошибок при вводе данных (email)
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorFields[] = 'email';
    }

//    Обработка ошибок при вводе данных (password)
    if ($password === '') {
        $errorFields[] = 'password';
    } else if (strlen($password) < 8) {
        $errorPasswordLen[] = 'password';
    }

//    Обработка ошибок при вводе данных (passwordConfirm)
    if ($passwordConfirm === '') {
        $errorFields[] = 'passwordConfirm';
    } else if (strlen($passwordConfirm) < 8) {
        $errorPasswordLen[] = 'passwordConfirm';
    }

//    Обработка ошибок при вводе данных (firstName)
    if ($firstName === '') {
        $errorFields[] = 'firstName';
    }

//    Обработка ошибок при вводе данных (lastName)
    if ($lastName === '') {
        $errorFields[] = 'lastName';
    }

//    Обработка ошибок при вводе данных (select)
    if ($select === '') {
        $errorFields[] = 'select';
    }

//    Обработка ошибок
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

        mysqli_query($connect, "INSERT INTO `madiAuth` (`email`, `password`, `work`, `firstName`, `lastName`, `class`, `avatar`, `emailProof`, `language`, `background`) VALUES ('$email', '$password', '$select', '$firstName', '$lastName', NULL, NULL, '$emailProof', '$language', '$background')");

        if (empty($errorFields)) {

            setcookie('emailProof', $email, time() + 86400 * 30 * 12, '/');

            mail($email, 'Подтверждение почты', "Благодарим Вас за регистрацию. Пожалуйста <a href=\"http://192.168.1.74/php/auth/emailProof.php\">Нажмите сюда!</a>");

            $response = [
                "status" => true,
                "message" => "Вы успешно зарегестрировались",
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