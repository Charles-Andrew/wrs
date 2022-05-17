<?php
session_start();

$pdo = new PDO('sqlite:db/transDb.db');

if (isset($_POST['btnitemedit']) && isset($_POST['in'])) {
    $_SESSION['cwid'] = $_POST['in'];
    header("Location: items");
}

if (isset($_POST['btnitemupdate']) && isset($_POST['nn']) && isset($_POST['np'])) {
    $nn = $_POST['nn'];
    $np = $_POST['np'];

    $sql = "UPDATE items SET itemName ='$nn', itemPrice = '$np' WHERE itemID = '".$_SESSION['cwid']."'";
    $statement = $pdo -> query($sql);
    if ($statement) {
        $_SESSION['ius'] = true;
        header("Location: items");
        unset($_SESSION['cwid']);
    }else{
        header("Location: items");
    }
}

if (isset($_POST['btnaddnew']) && isset($_POST['nin']) && isset($_POST['nip'])) {
    $nin = $_POST['nin'];
    $nip = $_POST['nip'];

    $sql = "INSERT INTO items (itemName, itemPrice) VALUES ('$nin', '$nip')";
    $statement = $pdo -> query($sql);
    if ($statement) {
        $_SESSION['ias'] = true;
        header("Location: items");
    }else{
        header("Location: items");
    }
}

if (isset($_POST['btnitemdelete']) && isset($_POST['in'])) {
    $_SESSION['cwtd'] = $_POST['in'];
    $_SESSION['iad'] = true;
    header("Location: items");
}

if (isset($_GET['del']) && $_GET['del']) {

    $sql = "DELETE FROM items WHERE itemID = '".$_SESSION['cwtd']."'";
    $statement = $pdo -> query($sql);
    if ($statement) {
        $_SESSION['ids'] = true;
        unset($_SESSION['iad']);
        unset($_SESSION['cwid']);
        unset($_SESSION['cwtd']);
        header("Location: items");
    }else{
        header("Location: items");
    }
}