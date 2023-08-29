<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>My Store</title>
</head>
<body>
   
<?php include '../components/user_header.php'; ?>
    
    <div id="hero">
        <div class="hero-container w-full max-h-30vh">
            <div class="hero-main flex flex-row justify-between md:justify-around items-center w-100">
                <div class="inner-hero m-8 ">
                    <h3 class="text-6xl font-mono mb-6">Summer Sale</h3>
                    <h4 class="text-2xl">Great Deals!!!</h4>
                    <button type="button" class="bg-[#49d8f1e3] text-red-900 hover:bg-blue-300 rounded-md shadow-lg p-1 mt-2">Shop Now</button>
                </div>
                <div>
                    <img src="./assets/images/a64b345016e96adfb8849af5521c8e0ecfe8f027-555x555.webp" alt="earphone" />
                </div>
              
            </div>
           
        </div>
    </div>

    <div id="features-container" class="flex flex-col md:flex-row justify-around mt-8 mb-8">
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
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
                <img src="assets/images/watch_4.webp" alt="smartwatch" >
                <p>Product Name</p>
                <p>product price</p>
                <button class="bg-red-800
                 text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl" id="addToCart">Add to cart  <i class="fa-solid fa-cart-shopping" ></i></button>
            </div>
            <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
                <img src="assets/images/earphones_a_4.webp" alt="earphone" >
                <p>Product Name</p>
                <p>product price</p>
                <button class="bg-red-800 text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl">Add to cart  <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
            <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
                <img src="assets/images/earphones_b_2.webp" alt="earphone" >
                <p>Product Name</p>
                <p>product price</p>
                <button class="bg-red-800 text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl">Add to cart  <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
            <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
                <img src="assets/images/speaker2.webp" alt="earphone" >
                <p>Product Name</p>
                <p>product price</p>
                <button class="bg-red-800 text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl">Add to cart  <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
            <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
                <img src="assets/images/earphones_c_2.webp" alt="earphone" >
                <p>Product Name</p>
                <p>product price</p>
                <button class="bg-red-800 text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl">Add to cart  <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
        </div>
    </div>

    <footer id="footer" class="bg-neutral-700 w-full mt-5">
        <div class="text-white pl-6 h-10 flex justify-center items-center">All rights reserved © Sounds Beats</div>
    </footer>

    <script src="../assets/js/header.js"></script>
    <script>
    </script>
</body>
</html>