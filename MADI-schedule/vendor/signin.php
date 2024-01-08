<?php
    session_start();
    $connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

    if (!$connect) {
        die ("Error connect to DataBase");
    }

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `email` = '$email' AND `password` = '$password'");

    if (mysqli_num_rows($checkUser) > 0) {

        $user = mysqli_fetch_assoc($checkUser);

        $_SESSION['user'] = [
            'fullName' => $user['fullName'],
            'email' => $user['email']
        ];

        header('Location: ../php/profile.php');
        exit;
    } else {
        $_SESSION['msg'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
        exit;
    }