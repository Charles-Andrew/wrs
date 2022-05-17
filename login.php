<?php 
session_start();
$pdo = new PDO('sqlite:db/transDb.db');

if (isset($_POST['lb'])) {
    $pw = $_POST['apw'];

    $sql = "SELECT * FROM admin WHERE asKey = '$pw'";
    $statement = $pdo -> query($sql);
    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) != 0) {
        $_SESSION['admin'] = true;
        header("Location: admin");
    }else{
        $_SESSION['alaf'] = true;
        header("Location: index");
    }
}