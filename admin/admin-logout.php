<?php
session_start();

if(!isset($_SESSION["user"])) {
    header("location:index.php");
} elseif(!isset($_SESSION["adminLogin"])) {
    header("location:../index.php");
}

session_destroy();
header("location:../index.php");
?>