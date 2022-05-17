<?php 
include '../codeGen.php';

session_start();

if (isset($_GET['orderinit'])) {
    $_SESSION["activeorder"] = true;
    if (!isset($_SESSION["coc"])) {
        $_SESSION["coc"] = CG('../db/transDb.db');
    }
    header("Location: ../index");
}

