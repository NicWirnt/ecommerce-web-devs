<?php
    include '../config/connect.php';
    
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
    }

    include '../components/cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thank you for your Purchase</title>
</head>
<body>
<?php include '../components/user_header.php' ?>
<?php
    $product_name = $_GET['product'];
    $product = $conn->prepare("SELECT * FROM `products` WHERE ProductName = ?");
    $product->execute([$product_name]);
    if($product->rowCount() > 0){
        while($fetch_product = $product->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div id="product-container">
            <form action="" method="post">
            <div id="product-details-container" class="w-100vw min-h-[70vh] ">
                <input type="hidden" name="ProductId" value="<?= $fetch_product['ProductId']; ?>">
                <input type="hidden" name="ProductName" value="<?= $fetch_product['ProductName']; ?>">
                <input type="hidden" name="UnitPrice" value="<?= $fetch_product['UnitPrice']; ?>">
                <input type="hidden" name="ProductImage" value="<?= $fetch_product['ImagePath']; ?>">
                <div class="image-container">
                    <img src="../<?= $fetch_product['ImagePath']; ?>" alt="<?= $fetch_product['ProductDescription'] ?>" class="product-detail-image"/>
                </div>
                <div class="product-detail-desc">
                    <h1 class="text-2xl font-bold"><?= $fetch_product['ProductName'] ?></h1>
                    <h4 class="font-bold">Details:</h4>
                    <p><?= $fetch_product['ProductDescription'] ?></p>
                    <p class="price">$<?= $fetch_product['UnitPrice']; ?></p>
                    <p><input type="number" name="qty" min="1" max="99" value="1" class="font-bold w-[3rem] border-2 rounded p-1 mb-4"/></p>
                    <input class="bg-blue-700 text-center w-full
                     text-white rounded-md p-1 hover:bg-red-500 mb-1 shadow-xl hover:cursor-pointer" type="submit" name="add_to_cart" value="Add to Cart"
                     
                     />
                </div>
            </div>
            </div>
            </form>
            <?php
        }
    } else{

    }
?>
    

    <?php include '../components/user_footer.php' ?>
    <script src="../assets/js/header.js"></script>
</body>
</html>