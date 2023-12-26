<?php
$name = $_POST['name'];
$select = $_POST['select'];

if (trim($name) === '') {
    echo 'Вы не ввели свое ФИО';
}
if (trim($select) === '') {
    echo 'Вы не выбрали вариант из выпадающего списка';
} else {
    $mysql = new mysqli('192.168.1.74:3306', 'admin', 'ijhyu13113', 'madi');
    if ($mysql->connect_error) {
        echo 'Error Number: ' . $mysql->connect_errno . '<br>';
        echo 'Error: ' . $mysql->connect_error;
        exit();
    } else {
        $mysql->query("UPDATE madiAuth SET `name` = '$name', `class` = '$select' order by `id` DESC limit 1");
    }
    $mysql->close();
    header('Location: ../html/auth/register_final_step.html');
    exit();
}