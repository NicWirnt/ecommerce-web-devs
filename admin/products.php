<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Product Management</p>
    <?php 
        include("../config/connect.php");
        include("welcome.php");
        $conn = OpenCon();
        session_start();
        if(isset($_SESSION['admin_id'])){ ?>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Product Name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Product Price</th>
                        <th scope="col" class="px-6 py-3">Edit</th>
                    </tr> 
                </thead>   
            <?php
            $select = $conn->prepare("SELECT * FROM `products`;");
            $select->execute();
            if($select->rowCount() > 0){ 
                while($row = $select->fetch(PDO::FETCH_ASSOC)){ ?>          
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4"><?= $row['ProductName']; ?></td>
                        <td class="px-6 py-4"><?= $row['ProductDescription']; ?></td>
                        <td class="px-6 py-4">$<?= $row['UnitPrice']  ?></td>
                        <td class="px-6 py-4">
                            <a href="/final/ecommerce-web-devs/admin/product.php?id=<?= $row['ProductId'];?>">
                                <i class="fa fa-edit"></i> 
                            </a>
                            
                    </td>
                    </tr>
                    <?php    
                } ?> </table> </div>
            <?php
            }else{
                echo '<h2>No products FOund!</h2>';
            }
        } else{
            echo '<h2>Need admin access</h2>';
        }
        

        
        CloseCon($conn);
    ?>          
</div>