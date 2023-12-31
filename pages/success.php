<?php
    include '../config/connect.php';
    
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
    }

    $orderId = $_GET['orderId'];
    $update_order = $conn->prepare("UPDATE `orders` SET `Paid` = ? WHERE `orders`.`OrderId` = ?");
    $update_order->execute([true, $orderId]);
    include '../components/cart.php';
    require_once '../components/success_purchase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thank you for your Purchase</title>
</head>
<body>
<?php include '../components/user_header.php' ?>

    <div id="success-container" class="min-h-[70vh]">
    <div id="page-title" class="w-100vw">
            <div class="w-full bg-neutral-100 h-32 flex items-center justify-center flex-col">
                <p><a href="/ass2/pages/index.php" class="text-blue-500">HOME  > </a>THANK YOU FOR THE PURCHASE</p>
                <p class="font-bold text-4xl">Thank you</p>
            </div>
        </div>
    </div>

    <?php include '../components/user_footer.php' ?>
    <script src="../assets/js/header.js"></script>
</body>
</html>