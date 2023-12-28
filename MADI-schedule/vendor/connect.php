<?php
    $connect = mysqli_connect('localhost', 'admin', 'ijhyu13113', 'madi');

    if (!$connect) {
        die ("Error connect to DataBase");
    }