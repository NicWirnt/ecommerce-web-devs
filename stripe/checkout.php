<?php

require_once '../config/connect.php';

    if(isset($_POST['customerId'])){
        // $cart_data = json_decode($_POST['cartData'], true);
        $customerId = $_POST['customerId'];
        $cart_data = $conn->prepare("SELECT * FROM `cart` WHERE CustomerId = ?");
        $cart_data->execute([$customerId]);
        $cart_items = $cart_data->fetchAll(PDO::FETCH_ASSOC);

        require_once "../stripe-php-12.0.0/init.php";

        require_once "secret.php";
        
         $MY_DOMAIN = 'http://localhost/ass2/stripe';
     
     
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
             'success_url' => $MY_DOMAIN . '/..pages/success.php',
             'cancel_url' => $MY_DOMAIN . '/../pages/index.php',
             ]);
    
             header("Location: " . $checkout_session->url);
    }
?>