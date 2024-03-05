<?php

$connect = new PDO ('mysql:host=localhost;dbname=madi', 'admin', 'ijhyu13113');

$idFriend = strval($_COOKIE['msg']);
$idUser = strval($_COOKIE['id']);
$tableName = '';

if ($idUser > $idFriend) {
    $tableName = $idUser . '-' . $idFriend;
} else if ($idFriend > $idUser) {
    $tableName = $idFriend . '-' . $idUser;
}

if (!isset($_GET['action'])) {

    $start = ($_GET['start']) ? $_GET['start'] : 0;
    $sql = "SELECT * FROM `$tableName` WHERE id > '$start' LIMIT 100";

    try {
        $result = $connect->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    catch (PDOException $e){
        echo "<pre>"; print_r($sql); echo "</pre>";
        $this->error($e->getMessage());
    }
} else if ($_GET['action'] == 'add_message') {

    $msg = ($_POST['message']) ? $_POST['message'] : '';
    $sql = "INSERT INTO `$tableName` (`from`, `text`) VALUES (2, '$msg')";

    try {
        $result = $connect->exec($sql);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    catch (PDOException $e){
        echo "<pre>"; print_r($sql); echo "</pre>";
        $this->error($e->getMessage());
    }
}

