<?php

$idFriend = $_POST['id'];

setcookie('msg', $idFriend, time() + 3600, '/');

$response = [
    "status" => true
];

echo json_encode($response);