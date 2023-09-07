<?php
    include '../config/connect.php';
    
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
        $message[] = "Please Login First";
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
            <div class="w-full bg-neutral-100 h-32 flex items-center justify-center flex-col">
                <p class="font-bold text-4xl">Your Orders</p>
            </div>
        <div class="orders-table flex justify-center">
        <?php
            if($customer_id){
                ?>
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
                        $orderId = $fetch_orders['OrderId'];
                        $paymentMade = $fetch_orders['Paid'];
                        if($paymentMade==0){
                            $paymentMade = "Not Paid";
                        }else{
                            $paymentMade = "Paid";
                        }
                        
                        ?>
                    <tr>
                    <input type="text" value=<?= $orderId ?> name="orderId_<?= $orderId ?>" hidden>
                        <td class="text-center"><?= $fetch_orders['OrderId'] ?></td>
                        <td class="text-center">
                            <?php
                            echo $paymentMade;
                            ?>
                        </td>
                        
                        
                        <?php
                            if($paymentMade=="Not Paid"){
                                ?><td class="text-center">
                                    <button type="submit" formaction="../stripe/checkout.php?orderId=<?= $orderId ?>" name="checkout" class="bg-neutral-200 hover:bg-neutral-300 rounded-md p-1">
                                    Pay Now
                                    </button>
                                    </td>
                                <td class="text-center">
                                <a href="../components/order_delete.php?orderid=<?= $orderId ?>" onclick=" return confirm('Are you sure to delete this order?')"><button type="button" name="delete_from_order"><i class="fa-solid fa-trash" ></i></button></a>    
                                </td>
                                <td class="text-center">
                            <button type="submit" name="orders_detail" formaction="order_detail.php?orderId=<?= $orderId ?>" class="bg-neutral-200 hover:bg-neutral-300 rounded-md p-1">Order Details</button>
                        </td>
                                <?php
                            } else{
                                ?>
                                    <td colspan="3" class="text-center">
                                    <button type="submit" name="orders_detail" class="bg-neutral-200 hover:bg-neutral-300 rounded-md p-1" formaction="order_detail.php?orderId=<?= $orderId ?>" >Order Details</button>
                            </td>
                                <?php
                            }
                                
                        ?>
                        
                        
                        
                    </tr>
                        <?php
                    }
                }else{

                }
            ?>
               </form>
                </tbody>
            </table>
                <?php
            }else{
                ?>
                <div class="font-bold text-xl">Please Login first to see your orders</div>
                <?php
            }
        ?>
       
        </div>
    </div>
    <?php include '../components/user_footer.php' ?>
    <script src="../assets/js/header.js"></script>
</body>
</html>