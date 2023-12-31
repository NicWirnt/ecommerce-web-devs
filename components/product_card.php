

<div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    <?php
        $products;
        if(isset($_POST['search'])){
            $search = $_POST['search_bar'];
            
            $products = $conn->prepare("SELECT * FROM `products` WHERE ProductName LIKE '%{$search}%'");
            $products -> execute();
        }else if(isset($_GET['category'])){
            $category = $_GET['category'];
            
            $category_product = $conn->prepare("SELECT * FROM `categories` WHERE CategoryName = ?");
            $category_product -> execute([$category]);
            if($category_product->rowCount()>0){
                while($fetch_category = $category_product->fetch(PDO::FETCH_ASSOC)){
                    $category_id = $fetch_category['CategoryId'];
                    $products = $conn->prepare("SELECT * FROM `products` WHERE CategoryId = ?");
                    $products -> execute([$category_id]);
                }
            }
        }
        else{
            $products = $conn->prepare("SELECT * FROM `products`");
            $products -> execute();
        }
        
        
        if($products->rowCount() > 0){
            while($fetch_product = $products->fetch(PDO::FETCH_ASSOC)){
                ?>
                <form action="" method="post">
                <input type="hidden" name="ProductId" value="<?= $fetch_product['ProductId']; ?>">
                <input type="hidden" name="ProductName" value="<?= $fetch_product['ProductName']; ?>">
                <input type="hidden" name="UnitPrice" value="<?= $fetch_product['UnitPrice']; ?>">
                <input type="hidden" name="ProductImage" value="<?= $fetch_product['ImagePath']; ?>">
                <input type="hidden" name="ProductDescription" value="<?= $fetch_product['ProductDescription']; ?>">
                <div class="flex flex-col justify-center items-center gap-4 mt-10 w-full ">
                    
                    <a href="product_detail.php?product=<?= $fetch_product['ProductName']?>">
                    <div class=" bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 hover:cursor-pointer shadow-xl  text-center">
                    <div class="flex justify-center items-center w-52 md:w-48 lg:w-52 xl:w-64">
                    <img src="../<?= $fetch_product['ImagePath'] ?>" alt="<?= $fetch_product['ProductName'] ?>" class="rounded-md w-fit lg:h-52 md:h-40 h-40 " >
                    </div>
                    <p class="font-bold text-[1.5rem]"><?= $fetch_product['ProductName']; ?></p>
                    <p><?= $fetch_product['ProductDescription']; ?></p>
                    <p class="font-bold mt-2 flex flex-row justify-between mb-2">$<?= $fetch_product['UnitPrice']  ?> <input type="number" name="qty" min="1" max="99" value="1" class="w-[3rem] border-solid rounded p-1"/></p>
                
                    <input class="bg-blue-700 text-center w-full
                     text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl hover:cursor-pointer" type="submit" name="add_to_cart" value="Add to Cart"
                     
                     />
                   
                    </div>
                    </a>
                </div>
                </form>
                <?php    
            }
        }else{
            echo '<h2 class="font-bold">No products Found!</h2>';
        }
    ?>          
</div>