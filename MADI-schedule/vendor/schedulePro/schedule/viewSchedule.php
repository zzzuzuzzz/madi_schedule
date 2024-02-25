<?php

$date = $_POST['date'];

setcookie('scheduleViewDate', $date, time() + 300, '/');

$response = [
    "status" => true,
];

echo json_encode($response);