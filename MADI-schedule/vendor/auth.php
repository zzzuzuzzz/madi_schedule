<?php
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $mailSql = '';
    $passwordSql = '';
    $mailSqlPHP = '';
    $passwordSqlPHP = '';

    $link = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');
    $close = mysqli_close();

    if (trim($mail) === '') {
        echo 'Вы не ввели e-mail';
    } else if (strlen(trim($password)) <= 7) {
        echo 'Недопустимая длина пароля';
    } else {

        $mysql = new mysqli('localhost', 'admin', 'ijhyu13113', 'madi');
        if ($mysql->connect_error) {
            echo 'Error Number: '.$mysql->connect_errno.'<br>';
            echo 'Error: '.$mysql->connect_error;
            exit();
        } else {
            $mailSql = $mysql -> query(" SELECT EXISTS(SELECT `email` FROM `madiAuth` WHERE `email` = '$mail')");
            $mailSqlPHP = mysqli_fetch_array($mysql -> query("SELECT `email` FROM `madiAuth` WHERE `email` = '$mail'"));
            echo $mailSqlPHP;
            if (!$mailSql) {
                echo "ничего нет";
            } else {
                $passwordSqlPHP = mysqli_fetch_array($mysql -> query("SELECT `password` FROM `madiAuth` WHERE `email` = '$mail'"));
                if (($passwordSqlPHP === $password) && ($mailSqlPHP === $mail)){
                    echo "все прошло успешно";
                } else {
                    echo "Пароль или логин не подходит";
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