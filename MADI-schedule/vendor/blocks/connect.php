<?php
    $connect = mysqli_connect('192.168.1.74', 'admin', 'ijhyu13113', 'madi');

    if (!$connect) {
        die ("Error connect to DataBase");
    }