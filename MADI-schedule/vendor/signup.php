<?php
    session_start();
    $connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

    if (!$connect) {
        die ("Error connect to DataBase");
    }
//    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $fullName = $_POST['fullName'];
    $select = $_POST['select'];

    if ($password != $password_confirm) {
        $_SESSION['msg'] = 'Пароли не совпадают';
        header('Location: ../php/register.php');
        exit;
    } else if (trim($email) === '') {
        $_SESSION['msg'] = 'Вы не ввели свой Email';
        header('Location: ../php/register.php');
        exit;
    } else if (strlen(trim($password)) <= 7) {
        $_SESSION['msg'] = 'Пароль недопустимой длины';
        header('Location: ../php/register.php');
        exit;
    } else if ((strpos($password, '!') !== false) || (strpos($password, '@') !== false) || (strpos($password, '#') !== false) || (strpos($password, '$') !== false) || (strpos($password, '"') !== false) || (strpos($password, "'") !== false) || (strpos($password, '`') !== false)){
        $_SESSION['msg'] = 'В пароле содеражтся недопустимые символы';
        header('Location: ../php/register.php');
        exit;
    } else if (strlen(trim($password_confirm)) <= 7) {
        $_SESSION['msg'] = 'Пароль недопустимой длины';
        header('Location: ../php/register.php');
        exit;
    } else if ((strpos($password_confirm, '!') !== false) || (strpos($password_confirm, '@') !== false) || (strpos($password_confirm, '#') !== false) || (strpos($password_confirm, '$') !== false) || (strpos($password_confirm, '"') !== false) || (strpos($password_confirm, "'") !== false) || (strpos($password_confirm, '`') !== false)){
        $_SESSION['msg'] = 'В пароле содеражтся недопустимые символы';
        header('Location: ../php/register.php');
        exit;
    } else if (!$select) {
        $_SESSION['msg'] = 'Вы не выбрали вариант из выпадающего списка';
        header('Location: ../php/register.php');
        exit;
    } else if (!$fullName) {
        $_SESSION['msg'] = 'Вы не ввели свое имя';
        header('Location: ../php/register.php');
        exit;
    } else {
        $password = md5($password);
        mysqli_query($connect, "INSERT INTO `madiAuth` (`email`, `password`, `work`, `fullName`, `class`) VALUES ('$email', '$password', '$select', '$fullName', NULL)");
        $_SESSION['msg'] = 'Вы успешно зарегестрировались';
        header('Location: ../index.php');
    }