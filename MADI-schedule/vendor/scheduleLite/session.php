<?php
    session_start();
//    Подключение к БД
    $connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

//    Обработка ошибки подключения к БД
    if (!$connect) {
        die ("Error connect to DataBase");
    }

    $select = $_POST['select'];

    $errorFields = [];

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
    } else {
        $response = [
            "status" => true,
        ];
        echo json_encode($response);
    }

