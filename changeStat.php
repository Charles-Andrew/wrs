<?php
session_start();
$pdo = new PDO('sqlite:db/transDb.db');


if (isset($_GET['id2p']) && isset($_GET['stat'])) {
    $cwID = $_GET['id2p'];
    $stat = $_GET['stat'];

    if ($stat == 4) {
        $_SESSION["ctdel"] = $_GET['c'];
        $_SESSION["delinit"] = $cwID;
        header("Location: admin");
    }else{
        $sql = "UPDATE transactions SET tActive ='$stat' WHERE tID = '$cwID'";
        $statement = $pdo -> query($sql);
        if ($statement) {
            header("Location: admin");
        }else{
            echo 'something went wrong! :(';
        }
    }
}

if (isset($_GET['del'])) {
    $idtd = $_GET['del'];
    $sql = "DELETE FROM transactions WHERE tID = '$idtd'";
    $statement = $pdo -> query($sql);
    if ($statement) {
        $sql = "DELETE FROM transactionDetails WHERE tCode ='".$_SESSION['ctdel']."'";
        $statement = $pdo -> query($sql);
        if ($statement) {
            unset($_SESSION['ctdel']);
            $_SESSION['dsucc'] = true;
            header("Location: admin");
        }else{
            echo 'something went wrong! :(';
        }
    }else{
        echo 'something went wrong! :(';
    }
}