<?php

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

        setcookie('user', 'True', time() + 60 * 60 * 24 * 30 * 12, '/');
        setcookie('class', $select, time() + 60 * 60 * 24 * 30 * 12, '/');

        echo json_encode($response);
    }

