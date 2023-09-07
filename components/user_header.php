<?php 
    if(isset($message)){
        foreach($message as $message){
            echo '
                <div class="message">
                    <span > '.$message.'</span>
                    <i class="fas fa-times hover:cursor-pointer hover:text-black font-bold text-lg text-red-500" onclick="this.parentElement.remove();"></i>
                </div> 
            ';
        }
    }

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id='';
    }

    $cart_count = 0;
?>

<header>
        <div class=" w-screen flex item-center justify-center mt-2">
            <div class="w-full">
                <div class="top-link flex flex-row justify-between border-b">
                    <div class=" flex flex-row gap-10 ml-8">
                        <a href="user_account.php"> <p class="">My Account</p></a>
                        <a href="#"><p class="">About Us</p></a>
                        <a href="login.php"><p class="">Log In</p></a>    
                    </div>
                    <div class="flex flex-row justify-around gap-6 mr-8">
                        <a href="" class="top-link-icons"><i class="fa-brands fa-facebook  "></i></a>
                        <a href="" class="top-link-icons"><i class="fa-brands fa-x-twitter "></i></a>
                        <a href="" class="top-link-icons"><i class="fa-brands fa-instagram "></i></a> 
                    </div>
                </div>
                <div class="middle-link flex flex-row justify-between ml-8 mr-8 mt-4 mb-4 ">
                    <div>
                        <i class="fa-solid fa-shop text-2xl"></i>
                    </div>
                    <div>
                        <form action="search.php" method="post" class="search-bar outline rounded-md shadow-lg">
                            <input type="text" placeholder="Search..." name="search_bar">
                            <button type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    </div>                   
                </div> 
            </div>
        </div>
    </header>

    <!-- Please change the anchor tag folder to your root folder name -->
    <div id="bottom-links" class=" sticky top-0 flex justify-between border-t-2 mb-6 bg-white z-index-50">
        <nav class="flex gap-4 nav-menu ml-8">
            <a href="/ass2/pages/index.php" >Home</a>
            <a href="/ass2/pages/product.php.">Products</a>
            <a href="/ass2/pages/categories_list.php">Categories</a>
        </nav>
        <div class="flex flex-row items-center justify-center gap-4">
        <?php
                $select_customer = $conn->prepare("SELECT * FROM `customers` WHERE ID = ?");
                $select_customer->execute([$customer_id]);
                if($select_customer->rowCount() > 0) {
                    $fetch_profile = $select_customer->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="flex flex-row gap-2 items-center">
                <p>Howdy, <?= $fetch_profile["FirstName"]; ?></p>
                <a href="../components/user_logout.php" onclick=" return confirm('Are you sure to logout?')"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                <i class="fa-solid fa-user"></i>
                </div>
                <div class="relative hover:cursor-pointer" id="cart">
                <i class="fa-solid fa-cart-shopping text-2xl pr-4 mr-1 mt-1"></i>
                    <?php 
                    $cart = $conn->prepare("SELECT * FROM `cart` WHERE CustomerId = ?");
                    $cart->execute([$customer_id]);
                    $cart_count = $cart->rowCount();
                    
                    ?>
                        <p class="absolute top-0 right-0 bg-red-200 rounded-full px-2 py-1 text-xs" id="cart-count"><?= $cart_count ?></p>
                    <?php
                    ?>
                
                </div>
                <div>
                </div>
                <?php
                }else{
                    ?>
                <div class="relative hover:cursor-pointer" id="cart">
                    <i class="fa-solid fa-cart-shopping text-2xl pr-4 mr-1 mt-1"></i>
                    <p class="absolute top-0 right-0 bg-red-200 rounded-full px-2 py-1 text-xs" id="cart-count">0</p>
                </div>
                    <?php
                }
                ?>
        </div>
    </div>
    
    <div class="cart">
        <div class="cart-wrapper">
            <div class="cart-container">
                <button type="button" class="cart-heading" id="back-cart">
                    <span class="heading">Your Cart</span>
                    <i class="fa-solid fa-arrow-left"></i>
                    <p><?= $cart_count ?> items</p>
                    </button>
                <?php 
                if($cart_count > 0 ){
                   while($fetch_cart = $cart->fetch(PDO::FETCH_ASSOC)){
                    ?>
                     
                    <form method="post">
                        <input type="hidden" name="CartId" value="<?= $fetch_cart['Id']; ?>">
                        <div id="cart-product-card" class="text-black flex flex-row items-center justify-between gap-4">
                        <img src="../<?= $fetch_cart['ImagePath'] ?>" alt="<?= $fetch_cart['ProductName'] ?>" class="w-20 h-20">
                        <p><?= $fetch_cart['ProductName'] ?></p>
                        <div>
                        <p>Qty : <input type="number" min="1" max="99" value="<?= $fetch_cart['Quantity'] ?>" name="cart-qty" class="border-4 rounded-md">
                        </p>
                        <p class="text-end">
                            $<?= $fetch_cart['Price'] * $fetch_cart['Quantity']; ?>
                        </p>
                        </div>
                        
                        <button type="submit" name="update_cart" ><i class="fa-solid fa-pen-to-square"></i></button>

                        <button type="submit" name="delete_from_cart"><i class="fa-solid fa-trash" ></i></button>
                        
                    </div>
                    <input type="hidden" name="customerId" value="<?= $fetch_profile['ID']; ?>">
                   
                    <?php
                   } ?>
                    <button type="submit" class="border-2 rounded-md p-2 mt-4 hover:bg-blue-200" name="checkout" formAction="../stripe/checkout.php" >
                        Checkout
                    </button>
                    </form>
                   <?php
                   
                } else{
                ?>
                <div class="m-10 font-bold">
                    Please Add Item
                </div>
                <?php
                }
                ?>
               
                
            </div>
        </div>
    </div>