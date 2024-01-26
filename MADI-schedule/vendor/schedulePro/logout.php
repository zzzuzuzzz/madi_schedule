<?php
    session_start();
    unset($_SESSION['profileTeacher']);
    unset($_SESSION['profileStudent']);
    header('Location: ../../index.php');
