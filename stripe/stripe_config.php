<?php
    require_once "../stripe-php-12.0.0/init.php";

    $stripedetails = array(
        "publishableKey"=>"pk_test_51Nfx7iJGScjbcuSLS29JYCQ6yy6HWcTc9gYCBsVQg4MjgBmdNuAF0joKPlECLvEaEPuwVYo1tmpoRN45wYE6htBg00tt0NFIQG",
        "secretKey"=>"sk_test_51Nfx7iJGScjbcuSLj12AOuo2U6NbLegv305yTQxTTPOvbT5GvmeP8gonuMHXn39NQH0hFL5QP4K4CgHUZl6pYJXO005suVqDWb",
    );

    \Stripe\Stripe::setApiKey($stripedetails['secretKey']);
?>