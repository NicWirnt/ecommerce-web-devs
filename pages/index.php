<?php
    include '../config/connect.php';
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
    }

    include '../components/cart.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MY Store</title>
</head>
<body>
   
<?php include '../components/user_header.php'; ?>
    
    <div id="hero">
        <div class="hero-container w-full max-h-30vh shadow-lg">
            <div class="hero-main flex flex-row justify-between md:justify-around items-center w-100">
                <div class="inner-hero m-8 ">
                    <h3 class="text-2xl md:text-6xl font-mono mb-6">Summer Sale</h3>
                    <h4 class="text-lg md:text-2xl">Great Deals!!!</h4>
                    <button type="button" class="bg-[#49d8f1e3] text-red-900 hover:bg-blue-300 rounded-md shadow-lg p-1 mt-2 text-sm md:text-base"><a href="product.php">Shop Now</a></button>
                </div>
                <div>
                    <img src="../assets/images/headphones_a_3.webp" alt="earphone" class="hero-banner-image"/>
                </div>
            </div>
        </div>
    </div>

    <div id="features-container" class="flex flex-col md:flex-row justify-around m-8 text-base md:text-lg shadow-lg">
        <div class="flex flex-row items-center gap-2">
            <i class="fa-solid fa-truck-fast text-4xl"></i>
            Free Shipping
        </div>
        <div class="flex flex-row items-center gap-2">
            <i class="fa-solid fa-money-bill text-4xl"></i>
            Money back guarantee
        </div>
        <div class="flex flex-row items-center gap-2">
            <i class="fa-solid fa-phone text-4xl"></i>
            <p>Online Support 24/7</p>
        </div>
    </div>

    <div id="product-list" class="w-100 m-20">
        <div class="text-center text-2xl mb-6">
            Featured Products
        </div>
        <?php include '../components/product_card.php' ?>
    </div>

    <?php include '../components/user_footer.php' ?>

    <script src="../assets/js/header.js"></script>
</body>
</html>