<?php
    include '../config/connect.php';
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
        header('location:index.php');
    } else{
        $customer_id = '';
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $pass = $_POST['password'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $confirmPass = $_POST['confirmPass'];
        $confirmPass = filter_var($confirmPass, FILTER_SANITIZE_STRING);
        $address = $_POST['address'];
        $address = filter_var($address, FILTER_SANITIZE_STRING);
        $country = $_POST['country'];
        $country = filter_var($country, FILTER_SANITIZE_STRING);
        $city = $_POST['city'];
        $city = filter_var($city, FILTER_SANITIZE_STRING);
        $postcode = $_POST['postcode'];
        $postcode = filter_var($postcode, FILTER_SANITIZE_STRING);
        $fName = $_POST['fName'];
        $fName = filter_var($fName, FILTER_SANITIZE_STRING);
        $lName = $_POST['lName'];
        $lName = filter_var($lName, FILTER_SANITIZE_STRING);
        $phone = $_POST['phone'];
        $phone = filter_var($phone, FILTER_SANITIZE_STRING);
        
        $existing_email = $conn->prepare("SELECT * FROM `customers` WHERE EMAIL = ?");
        $existing_email->execute([$email]);
        if($existing_email->rowCount()>0){
            $message = 'Email already exists!';
        }else{
            if($pass != $confirmPass){
                $message[] = `password doesnt match`;
            }else{
                $insert_customer = $conn->prepare("INSERT INTO `customers` (Email, Credential_Pass,FirstName, LastName, Address1, Country, City, PostalCode, Phone) VALUES (?,?,?,?,?,?,?,?,?)");
                $insert_customer->execute([$email, $pass, $fName, $lName, $address, $country, $city, $postcode,$phone]);
                $message[] = 'user created succesfully, please login now';
            }
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
    <title>Sign up</title>
</head>
<body>
<?php include '../components/user_header.php' ?>

    <div id="login-container" class="min-h-[70vh]">
        <div id="page-title" class="w-100vw">
            <div class="w-full bg-neutral-100 h-32 flex items-center justify-center flex-col">
                <p><a href="/ass2/pages/index.php" class="text-blue-500">HOME  > </a>SIGN UP</p>
                <p class="font-bold text-4xl">Sign Up</p>
            </div>
        </div>
        <?php include '../components/signup_form.php' ?>
    </div>

    <?php include '../components/user_footer.php' ?>
    <script src="../assets/js/header.js"></script>
</body>
</html>