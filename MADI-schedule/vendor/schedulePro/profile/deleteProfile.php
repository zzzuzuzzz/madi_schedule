<?php

include "../connect.php";

$id = strval($_COOKIE['id']);

$checkUser = mysqli_query($connect, "SELECT * FROM `$id`");
$numPost = intval(mysqli_num_rows($checkUser));

for ($numPost; $numPost > 0; $numPost--) {
    $user = mysqli_fetch_assoc($checkUser);

    $friendList = strval($user['friendList']);
    $toList = strval($user['toList']);
    $fromList = strval($user['fromList']);

    if ($friendList == NULL) {
        if ($toList == NULL) {
            if ($fromList == NULL) {
                continue;
            } else {
                mysqli_query($connect, "DELETE FROM `$fromList` WHERE `toList` = '$id'");
            }
        } else {
            mysqli_query($connect, "DELETE FROM `$toList` WHERE `fromList` = '$id'");
        }
    } else {
        mysqli_query($connect, "DELETE FROM `$friendList` WHERE `friendList` = '$id'");
    }
}

$avatar = strval($_COOKIE['avatar']);

if ($avatar) {
    unlink('../../../' . $avatar);
}

mysqli_query($connect, "DELETE FROM `madiAuth` WHERE `id` = '$id'");
mysqli_query($connect, "DROP TABLE `$id`");

$response = [
    "status" => true,
];

echo json_encode($response);