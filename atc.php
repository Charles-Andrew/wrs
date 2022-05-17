<?php
session_start();
date_default_timezone_set('Asia/Manila');

$pdo = new PDO('sqlite:db/transDb.db');

if (isset($_POST['atc']) && isset($_SESSION["coc"]) && $_POST['Product'] && $_POST['Quantity']) {
    $p = $_POST['Product'];
    $q = $_POST['Quantity']; 
    $c = $_SESSION["coc"];
    $price = 0;
    $nq = 0;

    $sql = "SELECT * FROM items WHERE itemID = '$p'";
    $statement = $pdo -> query($sql);
    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $item) {
        $price = $item["itemPrice"];
    }

    $tp = $price*$q;

    $sql = "SELECT * FROM transactionDetails WHERE tItemID = '$p' AND tCode = '$c'";
    $statement = $pdo -> query($sql);
    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $item) {
        $nq = $item["tItemQuantity"]+$q;
        $ntp = $item["tTotalPrice"]+$tp;
    }
    if (count($rows) != 0) {
        $sql = "UPDATE transactionDetails SET tItemQuantity ='$nq', tTotalPrice = '$ntp' WHERE tCode = '$c' AND tItemID = '$p'";
        $statement = $pdo -> query($sql);
        if ($statement) {
            $_SESSION['atcSuccess'] = true;
            header("Location: index");
        }else{
            echo 'something went wrong! :(';
        }
    }else{
        $sql = "INSERT INTO transactionDetails (tCode, tItemID, tItemQuantity, tTotalPrice) VALUES ('$c','$p', '$q', '$tp')";
        $statement = $pdo -> query($sql);
    
        if ($statement) {
            $_SESSION['atcSuccess'] = true;
            header("Location: index");
        }else{
            echo 'something went wrong! :(';
        }
    }
    $rn = $_POST['RN'];
    $rcn = $_POST['RCN'];
    $ca = $_POST['CA'];
    
    $_SESSION['rn'] = $rn;
    $_SESSION['rcn'] = $rcn;
    $_SESSION['ca'] = $ca;
}else{
    $_SESSION['blank'] = true;
    $rn = $_POST['RN'];
    $rcn = $_POST['RCN'];
    $ca = $_POST['CA'];
    
    $_SESSION['rn'] = $rn;
    $_SESSION['rcn'] = $rcn;
    $_SESSION['ca'] = $ca;
    header("Location: index");
}

if (isset($_POST['checkout']) && isset($_POST['oID']) && isset($_POST['RN']) && isset($_POST['RCN']) && isset($_POST['CA'])) {
    $oid = $_POST['oID'];
    $rn = $_POST['RN'];
    $rcn = $_POST['RCN'];
    $ca = $_POST['CA'];

    $sql = "SELECT * FROM transactionDetails WHERE tCode = '$oid'";
    $statement = $pdo -> query($sql);
    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        $_SESSION["emptyCart"] = true;
        header("Location: index");
    }else{
        $sql = "INSERT INTO transactions (tCode, tCustomerName, tAddress, tPhone, tDate) VALUES ('$oid','$rn', '$ca', '$rcn','".time()."')";
        $statement = $pdo -> query($sql);
        
        if ($statement) {
            $_SESSION['osr'] = true;
            unset($_SESSION['rn']);
            unset($_SESSION['rcn']);
            unset($_SESSION['ca']);
            header("Location: index");
        }else{
            echo 'something went wrong! :(';
        }
    }
}