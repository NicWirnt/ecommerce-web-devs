<?php
    
    include("../config/connect.php");
    $conn = OpenCon();
    session_start();
    if(isset($_SESSION['admin_id'])) {
        include("index.php");
        $Q = explode('=',$_SERVER['QUERY_STRING']);
        $cat_id = $Q[1];
        try {
            $delete = $conn->prepare("DELETE FROM `categories` WHERE `CategoryId` = ? LIMIT 1;");
            $delete->execute([$cat_id]);
            header("location: categories.php");
        } catch (\Throwable $th) {
            echo $th;
        }
        CloseCon($conn);
    } else{
        echo '<h2>Need admin access</h2>';
    }
?>