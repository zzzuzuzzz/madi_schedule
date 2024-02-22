<?php

$text = strval($_POST['text']);

mail('zzzuzuzzz@mail.ru', 'Удаление аккаунта - БОТ', $text);

$response = [
    "status" => true
];

echo json_encode($response);