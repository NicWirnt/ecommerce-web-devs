<?php

    if(!$customer_id){
        header("Location:ass2/pages/index.php");
        $message[] = "Forbidden";
    } else{
        $message[] = "Thank you for your purchase";
    }