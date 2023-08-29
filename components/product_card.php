

<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
    <?php 
        $products = $conn->prepare("SELECT * FROM `products`");
        $products -> execute();
        
        if($products->rowCount() > 0){
            while($fetch_product = $products->fetch(PDO::FETCH_ASSOC)){
                ?>
                    
                 <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
                <img src="assets/images/watch_4.webp" alt="<?= $fetch_product['ProductName'] ?>" >
                <p><?= $fetch_product['ProductName']; ?></p>
                <p>Description <br/><?= $fetch_product['ProductDescription']; ?></p>
                <p>$<?= $fetch_product['UnitPrice']  ?></p>
                <button class="bg-red-800
                 text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl">Add to cart  <i class="fa-solid fa-cart-shopping"></i></button>
                </div>
                <?php    
            }
        }else{
            echo '<h2>No products FOund!</h2>';
        }
    ?>          
</div>

<!-- <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
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
            </div> -->