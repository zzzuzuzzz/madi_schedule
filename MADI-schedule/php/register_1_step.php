<?php
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $password_two = $_POST['password_two'];
    $select = $_POST['select'];

    if (trim($mail) === '') {
        echo 'Вы не ввели e-mail';
    } else if (strlen(trim($password)) <= 7) {
        echo 'Недопустимая длина пароля';
    } else if ((trim($password)) !== (trim($password_two))) {
        echo 'Пароли не совпадают';
    } else {

        if ($select === 'teacher') {
            $mysql = new mysqli('192.168.1.74', 'test', 'test', 'test');
            if ($mysql->connect_error) {
                echo 'Error Number: '.$mysql->connect_errno.'<br>';
                echo 'Error: '.$mysql->connect_error;
                exit();
            }
            else {
                $mysql->query("INSERT INTO `main_table` (`email`, `password`, `work`) VALUES($mail, $password, $select)");
            }
            $mysql->close();
            header('Location: ../html/auth/register_teacher_step.html');
            exit();


        } else if ($select === 'student') {
            $mysql = new mysqli('192.168.1.74', 'test', 'test', 'test');
            if ($mysql->connect_error) {
                echo 'Error Number: '.$mysql->connect_errno.'<br>';
                echo 'Error: '.$mysql->connect_error;
                exit();
            }
            else {
                $mysql->query("INSERT INTO `main_table` (`email`, `password`, `work`) VALUES($mail, $password, $select)");
            }
            $mysql->close();
            header('Location: ../html/auth/register_student_step.html');
            exit();
        }

        else {
            echo 'Вы не выбрали вариант из выпадающего списка';
        }
    }