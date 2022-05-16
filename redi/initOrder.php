<?php 
session_start();

if (isset($_GET['orderinit'])) {
    $_SESSION["activeorder"] = true;
    echo 'Ungas';
    header("Location: ../index");
}

