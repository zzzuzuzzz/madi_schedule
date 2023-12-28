<?php

    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $select = $_POST['select'];

    if (trim($email) === '') {
        echo 'Вы не ввели e-mail';
    } else if (strlen(trim($password)) <= 7) {
        echo 'Недопустимая длина пароля';
    } else if ((trim($password)) !== (trim($password_confirm))) {
        echo 'Пароли не совпадают';
    } else if ((trim($select)) === '') {
        echo 'Вы не выбрали вариант из выпадающего списка';
    }