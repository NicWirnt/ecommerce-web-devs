<?php
    
    include("../config/connect.php");
    $conn = OpenCon();
    session_start();
    if(isset($_SESSION['admin_id'])) {
        include("welcome.php");
        $Q = explode('=',$_SERVER['QUERY_STRING']);
        $product_id = $Q[1];
        try {
            $delete = $conn->prepare("DELETE FROM `products` WHERE `ProductId` = ? LIMIT 1;");
            $delete->execute([$product_id]);
            header("location: products.php");
        } catch (\Throwable $th) {
            echo $th;
        }
        CloseCon($conn);
    } else{
        echo '<h2>Need admin access</h2>';
    }
?>