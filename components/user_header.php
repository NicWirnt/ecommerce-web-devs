<?php 
    if(isset($message)){
        foreach($message as $message){
            echo '
                <div class="message">
                    <span> '.$message.'</span>
                    <i class="fas fa-times hover:cursor-pointer hover:text-black font-bold text-lg text-red-500" onclick="this.parentElement.remove();"></i>
                </div> 
            ';
        }
    }

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } 
?>

<header>
        <div class=" w-screen flex item-center justify-center mt-2">
            <div class="w-full">
                <div class="top-link flex flex-row justify-between border-b">
                    <div class=" flex flex-row gap-10 ml-8">
                        <a href="#"> <p class="">My Account</p></a>
                        <a href="#"><p class="">About Us</p></a>
                        <a href="/ass2/pages/login.php"><p class="">Log In</p></a>    
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
                        <form action=""  class="search-bar outline rounded-md shadow-lg">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    </div>                   
                </div> 
            </div>
        </div>
    </header>
    <div id="bottom-links" class=" sticky top-0 flex justify-between border-t-2 mb-6 bg-white">
        <nav class="flex gap-4 nav-menu ml-8">
            <a href="/ass2/pages/index.php" >Home</a>
            <a href="/ass2/pages/product.php.">Products</a>
            <a href="/ass2/pages/categories.php">Categories</a>
        </nav>
        <div class="flex flex-row items-center justify-center gap-4">
            <div class="flex flex-row gap-2 items-center">
                <?php 
                $select_customer = $conn->prepare("SELECT * FROM `customers` WHERE ID = ?");
                $select_customer->execute([$customer_id]);
                if($select_customer->rowCount() > 0) {
                    $fetch_profile = $select_customer->fetch(PDO::FETCH_ASSOC);
                ?>
                <p>Howdy, <?= $fetch_profile["FirstName"]; ?></p>
                <i class="fa-solid fa-user"></i>
                <?php
                }
                
                ?>

            
            </div>
            <div class="relative hover:cursor-pointer">
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
        </div>
        
    </div>