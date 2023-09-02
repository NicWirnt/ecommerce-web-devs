<?php 
if(isset($_POST['add_to_cart'])){
    if($customer_id ==''){
        // header('location:/ass2/pages/login.php');
        $message[] = "Please login first";
    } else{
        $pid = $_POST['ProductId'];
        $pid = filter_var($pid, FILTER_SANITIZE_STRING);
        $name = $_POST['ProductName'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['UnitPrice'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
        $image = $_POST['ProductImage'];
        $image = filter_var($image , FILTER_SANITIZE_STRING);
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $check_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE CustomerId = ? AND ProductId = ?");
        $check_cart_items->execute([$customer_id, $pid]);

        if($check_cart_items->rowCount() > 0){
            $message[] = 'product qty updated in the cart';
            $existing_item = $check_cart_items->fetch(PDO::FETCH_ASSOC);
            $cart_id = $existing_item['Id'];
            $cart_qty = $existing_item['Quantity'];
            $update_qty = $cart_qty + $qty;

            $update_cart = $conn->prepare("UPDATE `cart` SET `Quantity` = ? WHERE `cart`.`Id` = ?");
            $update_cart->execute([$update_qty, $cart_id]);
        } else {
            $insert_cart = $conn->prepare("INSERT INTO `cart` (CustomerId, ProductId, ProductName, Price, Quantity, ImagePath) VALUES (?,?,?,?,?,?)");
            $insert_cart->execute([$customer_id, $pid, $name,$price, $qty, $image]);
            $message[] = 'Product added to cart!';
        }
    }
}

if(isset($_POST['delete_from_cart'])){
    $cartId = $_POST['CartId'];
    $cartId = filter_var($cartId, FILTER_SANITIZE_STRING);
    
    $update_cart = $conn->prepare("DELETE FROM `cart` WHERE `cart`.`Id` = ?" );
    $update_cart->execute([$cartId]);

    $message[] = "Product deleted from cart!";
}



?>