<?php

    include '../config/connect.php';
    $conn=openCon();

    if(isset($_POST['checkout'])){
        $orderId = $_POST['orderId'];

        $data = $conn->prepare("SELECT * FROM `orderdetails` WHERE OrderId = ?");
        $data->execute([$orderId]);
        $items = $data->fetchAll(PDO::FETCH_ASSOC);

        $products=$conn->prepare("SELECT * FROM `products` WHERE ProductId = ?");

        require_once "../stripe-php-12.0.0/init.php";

        require_once "secret.php";
        
         $MY_DOMAIN = 'http://localhost/ass2';
     
     
         \Stripe\Stripe::setApiKey($stripeSecretKey);
        
         header('Content-Type: application/json');

         $line_items = [];
         foreach ($items as $item) {
            $products->execute([$item['ProductId']]);
            $product = $products->fetch(PDO::FETCH_ASSOC);
            
            
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'aud',
                        'product_data' => [
                            'name' => $item['ProductId'],
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