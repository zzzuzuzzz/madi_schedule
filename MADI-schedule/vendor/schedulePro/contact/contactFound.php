<?php

include "../connect.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$true = 'true';

$errorFields = [];

if ($firstName === '') {
    $errorFields[] = 'firstName';
}
if ($lastName === '') {
    $errorFields[] = 'lastName';
}

if (!empty($errorFields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "fields" => $errorFields
    ];
    echo json_encode($response);
    die();
}

$checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `firstName` = '$firstName' AND `lastName` = '$lastName' AND `emailProof` = '$true'");

if (mysqli_num_rows($checkUser) > 0) {

    $val = 1;
    $numPost = intval(mysqli_num_rows($checkUser));

    for ($numPost; $numPost > 0; $numPost-- && $val++) {
        $user = mysqli_fetch_assoc($checkUser);

        if ($user['id'] === strval($_COOKIE['id'])) {
            continue;
        } else {
            $array = array(
                'cook_one' => strval($user['firstName']),
                'cook_two' => strval($user['lastName']),
                'cook_three' => strval($user['avatar']),
                'cook_four' => strval($user['id']),
                'cook_five' => strval($user['work']),
                'cook_six' => strval($user['class']),
            );

            $str = strval($val);

            setcookie('sql' . $str, serialize($array), time() + 60 * 60 * 24 * 30 * 12, '/');
        }
    };

    $response = [
        "status" => true
    ];

    echo json_encode($response);

} else {
    $response = [
        "status" => false,
        "type" => 2,
        "message" => 'Не удалось найти пользователей. Возможно они еще не прошли регистрацию.'
    ];

    echo json_encode($response);
}