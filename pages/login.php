<?php
    include '../config/connect.php';

    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
    }


    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $pass = $_POST['password'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        
        $select_customer = $conn->prepare("SELECT * FROM `customers` WHERE Email = ? AND Credential_pass = ?");
        $select_customer->execute([$email,$pass]);
        $row = $select_customer->fetch(PDO::FETCH_ASSOC);
    
        if($select_customer->rowCount() >0){
            $_SESSION['customer_id'] = $row['ID'];
            header('location:/ass2/pages/index.php');
        } else{
            $message[] = 'incorrect username or password!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sounds the Beats</title>
</head>
<body>
    <?php include '../components/user_header.php' ?>
   
    <div id="login-container" class="min-h-[70vh]">
        <div id="page-title" class="w-100vw">
            <div class="w-full bg-neutral-100 h-32 flex items-center justify-center flex-col">
                <p><a href="/ass2/pages/index.php" class="text-blue-500">HOME  > </a>LOGIN</p>
                <p class="font-bold text-4xl">Login</p>
            </div>
            <?php 
            if(!$customer_id){
                include '../components/login_form.php';
            } else  {?>
                <div class="w-full text-center mt-10 text-2xl font-bold">
                    You already logged in
                </div>
            <?php }
             ?>
        </div>
        
    </div>

    <?php include '../components/user_footer.php' ?>
</body>
</html>