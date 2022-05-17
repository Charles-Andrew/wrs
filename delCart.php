<?php 
session_start();
$pdo = new PDO('sqlite:db/transDb.db');

if (isset($_GET['id'])) {
    $idtd = $_GET['id'];

    $sql = "DELETE FROM transactionDetails WHERE tID = '$idtd'";
    $statement = $pdo -> query($sql);
    
    if ($statement) {
        $_SESSION["activeorder"] = true;
        header("Location: index");
    }else{
        echo "something went wrong :(";
    }
}