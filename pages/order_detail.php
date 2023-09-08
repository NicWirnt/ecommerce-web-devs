<?php
    include '../config/connect.php';
    
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
    }
    
    if(isset($_GET['orderId'])){
        $orderId = $_GET['orderId'];
        $order_details = $conn->prepare("SELECT * FROM `orderdetails` WHERE OrderId = ?");
        $order_details->execute([$orderId]);
    }else{
        $message[] = "Something has gone wrong!";
    }
    

    include '../components/cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Your orders with My Store</title>
</head>
<body>
    <?php include '../components/user_header.php' ?>
    <div id="order-container" class="min-h-[60vh] w-100vh">
            <div class="w-full bg-neutral-100 h-32 flex items-center justify-center flex-col">
                <p class="font-bold text-4xl">Your Order Number <?= $orderId ?></p>
                <a href="orders.php" class="font-bold">< Back</a>
            </div>
            
        <div class="orders-table flex justify-center">
        <table >
                <thead>
                    <tr>
                        <th>Order Number</td>
                        <th>Product Name</td>
                        <th>Product Description</td>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($order_details->rowCount()>0){
                            while($fetch_order_details = $order_details->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td><?= $fetch_order_details['OrderId'] ?></td>
                                    <?php
                                        $products=$conn->prepare("SELECT * FROM `products` WHERE ProductId = ?");
                                         $products->execute([$fetch_order_details['ProductId']]);
                                         $product = $products->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                             <td><?= $product['ProductName'] ?></td>
                                            <td><?= $product['ProductDescription'] ?></td>
                                        <?php
                                    ?>
                                   
                                    <td><?= $fetch_order_details['Price'] ?></td>
                                    <td><?= $fetch_order_details['Quantity'] ?></td>
                                    <td><?= $fetch_order_details['Total'] ?></td>
                                </tr>
                                <?php
                            }
                        } else{

                        }
                    ?>
                <tbody>
        </table>
        </div>
    </div>

    <?php include '../components/user_footer.php' ?>
    <script src="../assets/js/header.js"></script>
</body>
</html>