<?php

include "../connect.php";

$lessonName = $_POST['lessonName'];
$lessonType = $_POST['lessonType'];
$building = $_POST['building'];
$audience = $_POST['audience'];
$teacher = $_POST['teacher'];
$date = $_POST['date'];
$time = $_POST['time'];
$schedule = strval($_COOKIE['schedule']);
$val = 0;

if ($lessonName == '') {
    $title = NULL;
    $val++;
}
if ($lessonType == '') {
    $text = NULL;
    $val++;
}
if ($building == '') {
    $title = NULL;
    $val++;
}
if ($audience == '') {
    $text = NULL;
    $val++;
}
if ($teacher == '') {
    $title = NULL;
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
if ($time == '') {
    $response = [
        "status" => false,
        "type" => 3,
    ];

    echo json_encode($response);

    die();

} else {
    $time = strval($time);
    $dateForSql = date('H:i', strtotime($time));
}

if ($val == 5) {

    $response = [
        "status" => false,
        "type" => 1,
    ];

    echo json_encode($response);

    die();

} else {
    mysqli_query($connect, "INSERT INTO `$schedule` (`lessonName`, `lessonType`, `building`, `audience`, `teacherName`, `date`, `time`) VALUES ('$lessonName','$lessonType','$building','$audience','$teacher','$date','$time')");

    $response = [
        "status" => true
    ];

    echo json_encode($response);
}