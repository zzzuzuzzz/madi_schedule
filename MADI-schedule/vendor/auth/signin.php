<?php

    include "../schedulePro/connect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $true = 'True';

    $errorFields = [];

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorFields[] = 'email';
    }
    if ($password === '') {
        $errorFields[] = 'password';
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
    $password = md5($password);

    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `email` = '$email' AND `password` = '$password'");

    if (mysqli_num_rows($checkUser) > 0) {

        $user = mysqli_fetch_assoc($checkUser);

        if (strval($user['emailProof']) === "false") {
            $response = [
                "status" => false,
                "message" => 'Вы не подтвердили почту. Пожалуйста, перейдите в Ваш почтовый ящик и подтвердите его'
            ];

            echo json_encode($response);
        } else {
            if ($user['work'] == 'teacher') {

                $select = $user['class'];
                include "../schedulePro/profile/switchClassTeacher.php";

                setcookie('work', 'teacher', time() + 60 * 60 * 24 * 30 * 12, '/');
                setcookie('class', $select, time() + 60 * 60 * 24 * 30 * 12, '/');

                $response = [
                    "status" => true
                ];


            } else if ($user['work'] == 'student') {

                $select = $user['class'];
                include "../schedulePro/profile/switchClassStudent.php";

                setcookie('work', 'student', time()+86400*30*12, '/');
                setcookie('class', $select, time()+86400*30*12, '/');

                $response = [
                    "status" => true
                ];
            }

            setcookie('id', $user['id'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('profile', $true, time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('firstName', $user['firstName'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('lastName', $user['lastName'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('email', $user['email'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('language', $user['language'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('background', $user['background'], time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('avatar', $user['avatar'], time() + 60 * 60 * 24 * 30 * 12, '/');

            $id = strval($user['id']);
            $friendLocal = 'friendList_' . $id;
            $tasks = 'tasks_' . $id;
            $schedules = 'schedule_' . $id;

            mysqli_query($connect, "CREATE TABLE IF NOT EXISTS `$id` (`id` INT NOT NULL AUTO_INCREMENT, `friendList` INT, `toList` INT, `fromList` INT, `chat` VARCHAR(30), PRIMARY KEY(`id`))");
            mysqli_query($connect, "CREATE TABLE IF NOT EXISTS `$friendLocal` (`id` INT NOT NULL AUTO_INCREMENT, `firstName` VARCHAR(50), `lastName` VARCHAR(50), `email` VARCHAR(70), `work` VARCHAR(32), `avatar` VARCHAR(500), PRIMARY KEY(`id`))");
            mysqli_query($connect, "CREATE TABLE IF NOT EXISTS `$tasks` (`id` INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(30), `text` VARCHAR(50), `date` DATE, PRIMARY KEY (`id`))");
            mysqli_query($connect, "CREATE TABLE IF NOT EXISTS `$schedules` (`id` INT NOT NULL AUTO_INCREMENT , `lessonName` VARCHAR(30) , `lessonType` VARCHAR(30) , `building` VARCHAR(30) , `audience` VARCHAR(30) , `teacherName` VARCHAR(30) , `date` DATE , `time` TIME , PRIMARY KEY (`id`))");
            if (!is_dir('../../uploads/' . $friendLocal)) {
                mkdir('../../uploads/' . $friendLocal);
            }
            setcookie('friendListLocal', $friendLocal, time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('task', $tasks, time() + 60 * 60 * 24 * 30 * 12, '/');
            setcookie('schedule', $schedules, time() + 60 * 60 * 24 * 30 * 12, '/');

            echo json_encode($response);
        }

    } else {
        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];

        echo json_encode($response);
    }