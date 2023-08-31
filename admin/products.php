<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
    <?php 
        include("../config/connect.php");
        $conn = OpenCon();
        CloseCon($conn);
        $select = $conn->prepare("SELECT * FROM `products`;");
        $select->execute();

        if($select->rowCount() > 0){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                ?>
                    
                 <div class="flex flex-col justify-center items-center bg-neutral-200 rounded-xl transition-all duration-300 hover:bg-blue-200 hover:scale-110 gap-1">
                <p><?= $row['ProductName']; ?></p>
                <p>Description <br/><?= $row['ProductDescription']; ?></p>
                <p>$<?= $row['UnitPrice']  ?></p>
                <button class="bg-red-800
                 text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl">View  <i class="fa-solid fa-cart-shopping"></i></button>
                </div>
                <?php    
            }
        }else{
            echo '<h2>No products FOund!</h2>';
        }
        
    ?>          
</div>