<?php

include "../connect.php";

$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$select = $_POST['select'];
$friendList = strval($_COOKIE['friendListLocal']);
$val = 0;
$path = '';

if ($email == '') {
    $email = NULL;
    $val++;
}
if ($firstName == '') {
    $firstName = NULL;
    $val++;
}
if ($lastName == '') {
    $lastName = NULL;
    $val++;
}
if ($select == '' || $select == 'unvalue' || $select == 'null') {
    $select = NULL;
    $val++;
}
if (!$_FILES['avatar']) {
    $path = NULL;
    $val++;
} else {
    $path = 'uploads/' . $friendList . '/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../../../' . $path)) {
        $response = [
            "status" => false,
            "type" => 2,
        ];
        echo json_encode($response);
        die();
    }
}

if ($val == 5) {

    $response = [
        "status" => false,
        "type" => 1,
    ];

    echo json_encode($response);

    die();

} else {
    mysqli_query($connect, "INSERT INTO `$friendList` (`firstName`, `lastName`, `email`, `work`, `avatar`) VALUES ('$firstName', '$lastName', '$email', '$select', '$path')");

    $response = [
        "status" => true
    ];

    echo json_encode($response);
}