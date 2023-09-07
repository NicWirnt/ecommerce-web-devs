<?php
    include '../config/connect.php';
    
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
    }
    
    if(isset($_POST['add_to_order'])){
        $cart_data = $conn->prepare("SELECT * FROM `cart` WHERE CustomerId = ?");
        $cart_data->execute([$customer_id]);
        $ordersId;
                $date = date("Y-m-d");
                $paid = false;
                $paymentId=1;
                $insert_order = $conn->prepare("INSERT INTO `orders` (CustomerId,PaymentId, OrderDate, Paid) VALUES (?,?,?,?)");
                $insert_order->execute([$customer_id,$paymentId, $date, $paid]);
                if($insert_order){
                    $ordersId = $conn->lastInsertId();
                }
        if($cart_data->rowCount()>0){
            while($fetch_cart = $cart_data->fetch(PDO::FETCH_ASSOC)){
                $product_id = $fetch_cart['ProductId'];
                $product_name = $fetch_cart['ProductName'];
                $quantity = $fetch_cart['Quantity'];
                $price = $fetch_cart['Price'];
                $total = $quantity * $price;
                

                $insert_order_details = $conn->prepare("INSERT INTO `orderdetails` (OrderId, ProductId, Price, Quantity, Total) VALUES (?,?,?,?,?)");
                $insert_order_details->execute([$ordersId, $product_id, $price, $quantity, $total]);
                
                if($insert_order_details){
                    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE CustomerId = ?");
                    $delete_cart->execute([$customer_id]);
                }
            }
        }
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
        <div class="orders-table">
        <table >
                <thead>
                    <tr>
                        <th>Order Number</td>
                        <th>Status</td>
                        <th colspan="2" >Action</td>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>
                    <form method="POST">
                    
            <?php
                $orders = $conn->prepare("SELECT * FROM `orders` WHERE CustomerId = ?");
                $orders->execute([$customer_id]);
                if($orders->rowCount()>0){
                    while($fetch_orders = $orders->fetch(PDO::FETCH_ASSOC)){
                        $paymentMade = $fetch_orders['Paid'];
                        if($paymentMade==0){
                            $paymentMade = "Not Paid";
                        }else{
                            $paymentMade = "Paid";
                        }
                        ?>
                    <tr>
                    
                        <td class="text-center"><input type="text" value=<?= $fetch_orders['OrderId']; ?> name="orderId" readonly></td>
                        <td class="text-center">
                            <?php
                            echo $paymentMade;
                            ?>
                        </td>
                        <td class="text-center">
                            <button type="submit" formaction="../stripe/checkout.php" name="checkout" class="bg-neutral-200 hover:bg-neutral-300 rounded-md p-1">
                                Pay Now
                            </button>
                        </td>
                        <td class="text-center"><button type="submit" name="delete_from_order"><i class="fa-solid fa-trash" ></i></button></td>
                        <td class="text-center">
                            <button type="submit" name="orders_detail" class="bg-neutral-200 hover:bg-neutral-300 rounded-md p-1">Order Details</button>
                        </td>
                    </tr>
                        <?php
                    }
                }else{

                }
            ?>
               </form>
                </tbody>
            </table>
        </div>
    </div>
    <?php include '../components/user_footer.php' ?>
    <script src="../assets/js/header.js"></script>
</body>
</html>