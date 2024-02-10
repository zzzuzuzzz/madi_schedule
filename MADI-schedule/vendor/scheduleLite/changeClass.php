<?php

$select = $_POST['select'];

$errorFields = [];

if ($select === '') {
    $errorFields[] = 'select';
}

if (!empty($errorFields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Вы не выбрали подходящий Вам вариант",
        "fields" => $errorFields
    ];
    echo json_encode($response);
    die();

} else if (empty($errorFields)) {

    setcookie('class', $select, time()+86400*30*12, '/');

    $response = [
        "status" => true
    ];
}

echo json_encode($response);