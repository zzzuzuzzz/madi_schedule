<?php

include "../connect.php";

$title = $_POST['title'];
$text = $_POST['text'];
$date = $_POST['date'];
$task = strval($_COOKIE['task']);
$val = 0;

if ($title == '') {
    $title = NULL;
    $val++;
}
if ($text == '') {
    $text = NULL;
    $val++;
}
if ($date == '') {
    $response = [
        "status" => false,
        "type" => 2,
    ];

    echo json_encode($response);

    die();
} else {
    $date = strval($date);
    $dateForSql = date('Y-m-d', strtotime($date));
}
if ($val == 2) {

    $response = [
        "status" => false,
        "type" => 1,
    ];

    echo json_encode($response);

    die();

} else {
    mysqli_query($connect, "INSERT INTO `$task` (`title`, `text`, `date`) VALUES ('$title', '$text', '$dateForSql')");

    $response = [
        "status" => true
    ];

    echo json_encode($response);
}