<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Orders Management</p>
    
    <?php 
        include("../config/connect.php");
        include("index.php");
        $conn = OpenCon();
        session_start();
        if(isset($_SESSION['admin_id'])){ ?>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-blue-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Order Number</th>
                        <th scope="col" class="px-6 py-3">Order Date</th>
                        <th scope="col" class="px-6 py-3">Ship Date</th>
                        <th scope="col" class="px-6 py-3">Error Message</th>
                        <th scope="col" class="px-6 py-3">Fullfilled</th>
                        <th scope="col" class="px-6 py-3">Paid</th>
                        <th scope="col" class="px-6 py-3">Payment Date</th>
                        <th scope="col" class="px-6 py-3">Tax</th>
                        <th scope="col" class="px-6 py-3">View</th>
                        
                    </tr> 
                </thead>   
            <?php
            $select = $conn->prepare("SELECT * FROM `orders`;");
            $select->execute();
            if($select->rowCount() > 0){ 
                while($row = $select->fetch(PDO::FETCH_ASSOC)){ ?>          
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4"><?= $row['OrderNumber']; ?></td>
                        <td class="px-6 py-4"><?php echo date('m-d-Y',strtotime($row['OrderDate']));?></td>
                        <td class="px-6 py-4"><?php echo date('m-d-Y',strtotime($row['ShipDate'])); ?></td>
                        <td class="px-6 py-4"><?= $row['ErrorMsg']; ?></td>
                        <td class="px-6 py-4"><?= $row['Fullfilled']; ?></td>
                        <td class="px-6 py-4"><?php if($row['Paid'] == '1') {echo 'Yes';} else echo 'No';  ?></td>
                        <td class="px-6 py-4"><?= $row['PaymentDate']; ?></td>
                        <td class="px-6 py-4"><?= $row['SalesTax']; ?>%</td>
                        <td class="px-6 py-4">
                            <a href="/ass2/admin/order_details.php?id=<?= $row['OrderNumber'];?>">
                                <i class="fa fa-eye"></i> 
                            </a>                           
                        </td>
                    </tr>
                    <?php    
                } ?> </table> </div>
            <?php
            }else{
                echo '<h2>No Orders FOund!</h2>';
            }
        } else{
            echo '<h2>Need admin access</h2>';
        }
        

        
        CloseCon($conn);
    ?>   
</div>