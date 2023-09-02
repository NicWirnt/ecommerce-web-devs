<?php
    include '../config/connect.php';
    $conn = openCon();

    session_start();
    session_unset();
    session_destroy();
    header('location:../pages/index.php');
?>