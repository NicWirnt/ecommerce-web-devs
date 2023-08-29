<?php 
    if(isset($message)){
        foreach($message as $message){
            echo '
                <div class="message">
                    <span> '.$message.'</span>
                </div> 
            ';
        }
    }
?>

<header>
        <div class=" w-screen flex item-center justify-center mt-2">
            <div class="w-full">
                <div class="top-link flex flex-row justify-between border-b">
                    <div class=" flex flex-row gap-10 ml-8">
                        <a href="#"> <p class="">My Account</p></a>
                        <a href="#"><p class="">About Us</p></a>
                        <a href="#"><p class="">Log In</p></a>    
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
            <a href="/pages/index.html" >Home</a>
            <a href="/pages/product.html">Products</a>
            <a href="/categories.html">Categories</a>
        </nav>
        <div class="relative hover:cursor-pointer">
            <i class="fa-solid fa-cart-shopping text-2xl pr-4 mr-1 mt-1"></i>
            <p class="absolute top-0 right-0 bg-red-500 rounded-full px-2 py-1 text-xs" id="cart-count">0</p>
        </div>
    </div>