<?php

    include '../config/connect.php';
    $conn=openCon();

    if(isset($_POST['checkout'])){
        $qty = $_POST['qty'];

        $customerId = $_POST['customerId'];
        $cart_data = $conn->prepare("SELECT * FROM `cart` WHERE CustomerId = ?");
        $cart_data->execute([$customerId]);
        $cart_items = $cart_data->fetchAll(PDO::FETCH_ASSOC);

        require_once "../stripe-php-12.0.0/init.php";

        require_once "secret.php";
        
         $MY_DOMAIN = 'http://localhost/ass2';
     
     
         \Stripe\Stripe::setApiKey($stripeSecretKey);
        
         header('Content-Type: application/json');

         $line_items = [];
       
         foreach ($cart_items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'aud',
                    'product_data' => [
                        'name' => $item['ProductName'],
                        'images' => [$item['ImagePath']],
                    ],
                    'unit_amount' => $item['Price'] * 100,  
                ],
                'quantity' => $item['Quantity'], 
            ];
        }
        
        //Create a Stripe Checkout Session
         $checkout_session = \Stripe\Checkout\Session::create([
             'line_items' => $line_items,
             'mode'=>'payment',
             'billing_address_collection' => 'required',
             'shipping_address_collection' => [
                'allowed_countries' => ['AU'],
             ],
             'success_url' => $MY_DOMAIN . '/pages/success.php',
             'cancel_url' => $MY_DOMAIN . '/pages/index.php',
             ]);
    
             header("Location: " . $checkout_session->url);
    }
?>