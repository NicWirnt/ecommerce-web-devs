<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Category Management</p>

<?php
        include("../config/connect.php");
        include("index.php");
        $conn = OpenCon();
        session_start();
        if(isset($_SESSION['admin_id'])) {?>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Category Name</th>
                        <th scope="col" class="px-6 py-3">Category Description</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Edit</th>
                        <th scope="col" class="px-6 py-3">Delete</th>
                    </tr> 
                </thead>  
                <?php
                $select = $conn->prepare("SELECT * FROM `categories`;");
                $select->execute();
                if($select->rowCount() > 0){ 
                while($row = $select->fetch(PDO::FETCH_ASSOC)){ ?> 
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4"><?= $row['CategoryName']; ?></td>
                        <td class="px-6 py-4"><?= $row['CategoryDescription']; ?></td>
                        <td class="px-6 py-4"><?php 
                        if($row['Active']=="1") {  
                            echo "Active";
                        } 
                        else {echo "InActive";};  
                        ?></td>
                        <td class="px-6 py-4">
                            <a href="/final/ecommerce-web-devs/admin/category.php?id=<?= $row['CategoryId'];?>">
                                <i class="fa fa-edit"></i> 
                            </a>
                            
                        </td>
                        <td class="px-6 py-4">
                            <a href="/final/ecommerce-web-devs/admin/delete_category.php?id=<?= $row['CategoryId'];?>">
                                <i class="fa fa-remove"></i> 
                            </a>
                            
                        </td>
                    </tr>
        <?php } }else{
                echo '<h2>No Category Found!</h2>';
            } ?> 
        </table> </div>
        <?php 
            } else{
                echo '<h2>Need Admin Access</h2>';
            }
        CloseCon($conn);
?>
<p class="text-sky-400"> <a href="add_product.php">Add New Category</a></p>     
</div>