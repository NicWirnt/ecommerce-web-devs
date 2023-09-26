<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Customers Management</p>

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
                        <th scope="col" class="px-6 py-3">Customer First Name</th>
                        <th scope="col" class="px-6 py-3">Customer Last Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">City</th>
                        <th scope="col" class="px-6 py-3">Phone</th>
                        <th scope="col" class="px-6 py-3">Postal Code</th>
                        <th scope="col" class="px-6 py-3">View</th>
                    </tr> 
                </thead>  
                <?php
                $select = $conn->prepare("SELECT * FROM `customers`;");
                $select->execute();
                if($select->rowCount() > 0){ 
                while($row = $select->fetch(PDO::FETCH_ASSOC)){ ?> 
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4"><?= $row['FirstName']; ?></td>
                        <td class="px-6 py-4"><?= $row['LastName']; ?></td>
                        <td class="px-6 py-4"><?= $row['Email']; ?></td>
                        <td class="px-6 py-4"><?= $row['Address1']; ?></td>
                        <td class="px-6 py-4"><?= $row['City']; ?></td>
                        <td class="px-6 py-4"><?= $row['Phone']; ?></td>
                        <td class="px-6 py-4"><?= $row['PostalCode']; ?></td>
                        <td class="px-6 py-4">
                            <a href="/ass2/admin/customer.php?id=<?= $row['ID'];?>">
                                <i class="fa fa-eye"></i> 
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