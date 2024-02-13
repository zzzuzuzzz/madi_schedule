<?php

    setcookie('profileTeacher', '', -1, '/');
    setcookie('profileStudent', '', -1, '/');


    setcookie('class', '', -1, '/');
    setcookie('firstName', '', -1, '/');
    setcookie('lastName', '', -1, '/');
    setcookie('email', '', -1, '/');
    setcookie('language', '', -1, '/');
    setcookie('background', '', -1, '/');

    header('Location: ../../index.php');