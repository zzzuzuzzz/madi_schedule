<?php
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $mailSql = '';
    $passwordSql = '';


    if (trim($mail) === '') {
        echo 'Вы не ввели e-mail';
    } else if (strlen(trim($password)) <= 7) {
        echo 'Недопустимая длина пароля';
    } else {

        $mysql = new mysqli('192.168.1.74:3306', 'admin', 'ijhyu13113', 'madi');
        if ($mysql->connect_error) {
            echo 'Error Number: '.$mysql->connect_errno.'<br>';
            echo 'Error: '.$mysql->connect_error;
            exit();
        } else {
            $mailSql = $mysql -> query("SELECT `email` FROM `madiAuth` WHERE `email` = '$mail'");
            if ($mailSql === "") {
                echo "ничего нет";
            } else {
                $passwordSql = $mysql -> query("SELECT `password` FROM `madiAuth` WHERE `email` = '$mail'");
                if ($passwordSql === "") {
                    echo "Пароля нет";
                } else {
                    if (($passwordSql === $password) && ($mailSql === $mail)){
                        echo "все прошло успешно";
                    } else {
                        echo "Пароль или логин не подходит";
                    }
                }
            }
        }
        $mysql->close();

//        if ($select === 'teacher') {
//            header('Location: ../html/auth/register_teacher_step.html');
//            exit();
//        } else if ($select === 'student') {
//            header('Location: ../html/auth/register_student_step.html');
//            exit();
//        }
    }