<?php
session_start();

$codeProof = $_POST['codeProof'];

$errorFields = [];

if ($codeProof === '') {
    $errorFields[] = 'codeProof';
}

if (!empty($errorFields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверте правильность полей",
        "fields" => $errorFields
    ];
    echo json_encode($response);
    die();
}

$codeProofFromSession = $_SESSION['codeFromEmail']['codeProof'];

if ($codeProofFromSession === $codeProof) {

    $response = [
        "status" => true
    ];

    echo json_encode($response);


} else {
    $response = [
        "status" => false,
        "message" => 'Код не совпадает'
    ];

    echo json_encode($response);
}