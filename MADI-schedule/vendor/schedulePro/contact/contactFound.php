<?php

include "../connect.php";

$fullName = $_POST['fullName'];
$true = 'true';

$errorFields = [];

if ($fullName === '') {
    $errorFields[] = 'fullName';
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

$sep = " \n\t";
$token = strtok( $fullName, $sep );
$array = [];

while ($token) {
    $array[] = $token;
    $token = strtok( $sep );
}

$firstName = strval($array[0]);
$lastName = strval($array[1]);

if (!$firstName) {
    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `lastName` = '$lastName' AND `emailProof` = '$true'");
    $checkUserTwo = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `firstName` = '$lastName' AND `emailProof` = '$true'");
} else if (!$lastName) {
    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `firstName` = '$firstName' AND `emailProof` = '$true'");
    $checkUserTwo = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `lastName` = '$firstName' AND `emailProof` = '$true'");
} else {
    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `firstName` = '$firstName' AND `lastName` = '$lastName' AND `emailProof` = '$true'");
    $checkUserTwo = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `firstName` = '$lastName' AND `lastName` = '$firstName' AND `emailProof` = '$true'");
}

if (mysqli_num_rows($checkUser) > 0 || mysqli_num_rows($checkUserTwo) > 0) {

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
    }

    $numPost = intval(mysqli_num_rows($checkUserTwo));

    for ($numPost; $numPost > 0; $numPost-- && $val++) {
        $user = mysqli_fetch_assoc($checkUserTwo);

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