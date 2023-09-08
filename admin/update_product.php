<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Product Details Management</p>
<?php
    
    include("../config/connect.php");
    include("welcome.php");
    $conn = OpenCon();
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST['ProductId'];
        $name = $_POST['ProductName'];
        $description = $_POST['ProductDescription'];
        $suplierId = $_POST['supplier'];
        $availability = $_POST['ProductAvailable'];
        $cat = $_POST['category'];
        $instock = $_POST['UnitInStock'];
        $size = $_POST['AvailableSize'];
        $price = $_POST['UnitPrice'];
        try {
            $insert = $conn->prepare("UPDATE `products` SET `ProductName` = ?, `ProductDescription` = ?, 
            `SupplierId` = ?, `CategoryId` = ?, `UnitPrice` = ?, 
            `AvailableSize` = ?, `UnitInStock` = ?, `ProductAvailable` = ? WHERE `ProductId` = ?");
        $insert->execute([$name, $description, $suplierId, $cat, $price, $size, $instock, $availability, $productId]);
        header("location: products.php");

        } catch (\Throwable $th) {
            echo $th;
        }
        
    } else {
        echo "Updated Product Not Found";
    }
?>