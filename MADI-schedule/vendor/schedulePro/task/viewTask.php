<?php

$date = $_POST['date'];

setcookie('taskViewDate', $date, time() + 300, '/');

$response = [
    "status" => true,
];

echo json_encode($response);
