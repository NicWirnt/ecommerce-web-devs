<?php
    include '../config/connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="../assets/css/style.css">
    <title>Sounds the Beats</title>
</head>
<body>
    <?php include '../components/user_header.php' ?>
    
    <div id="product-list" class="w-100 m-20">
        <div class="text-center text-2xl mb-6">
            Products
        </div>

             <?php include '../components/product_card.php' ?>
        
    </div>

    <?php include '../components/user_footer.php' ?>

    <script src="../assets/js/header.js"></script>
</body>
</html>