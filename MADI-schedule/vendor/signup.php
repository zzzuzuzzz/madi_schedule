<?php
//    Начало сесии
    session_start();
//    Подключение к БД
    $connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

//    Обработка ошибки подключения к БД
    if (!$connect) {
        die ("Error connect to DataBase");
    }
//    Надо поправить подключение к БД через файл
//    require_once 'connect.php';

//    Получение из HTML формы данных и запись в переменные
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $fullName = $_POST['fullName'];
    $select = $_POST['select'];

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

//    Обработка ошибок при вводе данных (fullName)
    if ($fullName === '') {
        $errorFields[] = 'fullName';
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

        mysqli_query($connect, "INSERT INTO `madiAuth` (`email`, `password`, `work`, `fullName`, `class`) VALUES ('$email', '$password', '$select', '$fullName', NULL)");

        if (empty($errorFields)) {
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