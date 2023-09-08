<?php
    include '../config/connect.php';
    $conn = openCon();

    $orderId = $_GET['orderid'];
    
    $delete_order_details = $conn->prepare("DELETE FROM `orderdetails` WHERE `orderdetails`.`OrderId` = ?");
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE `orders`.`OrderId` = ?");
    
    $delete_order_details->execute([$orderId]);
    $delete_order->execute([$orderId]);
    header('location:../pages/orders.php');
?>