<?php
    include '../config/connect.php';
    $conn = openCon();
    session_start();

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
    } else{
        $customer_id = '';
        $message[] = "Please login first";
    }

    if(isset($_POST['update_profile'])){
        $email = $_POST['email'];

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

        $check_pass  =$conn->prepare("SELECT Credential_pass FROM `customers` WHERE `Email` = ?");
        $check_pass->execute([$email]);
        $stored_pass = $check_pass->fetchColumn();

        if($confirmPass == $stored_pass){
            $update_profile = $conn->prepare("UPDATE `customers` SET `FirstName`=?, `LastName`=?, `Address1`=?, `Country`=?, `City`=?, `PostalCode`=?, `Phone`=? WHERE `customers`.`Email` = ?");
            $update_profile->execute([$fName, $lName, $address, $country, $city, $postcode, $phone, $email]);
            $message[] = "Profile updated";
        }else{
           $message[] = "Your password doesnt match!";
        }

    }

    include '../components/cart.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="../assets/css/style.css">
    <title>My Store</title>
</head>
<body>
    <?php include '../components/user_header.php' ?>
    
    <div id="product-list" class="w-100 m-20">
        <div class="text-center text-2xl mb-6">
            User Profile
        </div>
        <?php
            if(!$customer_id){
                ?>
                    <div class="font-bold text-xl">Please Login first to see your profile</div>
                <?php
            }else{
                $customer = $conn->prepare("SELECT * FROM `customers` WHERE ID = ?");
                $customer->execute([$customer_id]);
                $fetch_profile=$customer->fetch(PDO::FETCH_ASSOC);
                ?>
                    
    <div id="profile-container" class="w-100vw">
            <div id="profile-form" class="w-full flex items-center justify-center">
                <div class="w-[50%] m-10">
                    <form class="" action="" method="post">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Enter your email" name="email" required class="input-form-login"
                        value="<?= $fetch_profile['Email']; ?>" readonly
                        />
                        <div class='flex flex-row'>
                            <div>
                            <label for="fName">First Name</label>
                            <input type="text" placeholder="Enter your first name" name="fName" required 
                            value="<?= $fetch_profile['FirstName']; ?>"
                            class="input-form-login"/>
                            </div>
                            <div>
                            <label for="lName">Last Name</label>
                            <input type="text" placeholder="Enter your last name" name="lName" value="<?= $fetch_profile['LastName']; ?>" class="input-form-login"/>
                            </div>
                        
                        </div>
                        <label for="adress">Address</label>
                            <input type="text" placeholder="Enter your address" name="address" required value="<?= $fetch_profile['Address1']; ?>" class="input-form-login"/>
                        <div class='flex flex-row'>
                            <div>
                            <label for="Country">Country</label>
                            <input type="text" placeholder="Country" name="country" required value="<?= $fetch_profile['Country']; ?>" class="input-form-login"/>
                            </div>
                            <div>
                            <label for="city">City</label>
                            <input type="text" placeholder="City" name="city" required value="<?= $fetch_profile['City']; ?>" class="input-form-login"/>
                            </div>
                            <div>
                            <label for="postcode">Post Code</label>
                            <input type="text" placeholder="Post Code" name="postcode" required  value="<?= $fetch_profile['PostalCode']; ?>" class="input-form-login"/>
                            </div>
                        
                        </div>
                        <label for="phone">Phone</label>
                        <input type="text" placeholder="Enter your phone number" name="phone" required value="<?= $fetch_profile['Phone']; ?>" class="input-form-login"/> 
                        <label for="confirmPass">Confirm your password</label>
                        <input type="password" required placeholder="Confirm your password" name="confirmPass" class="input-form-login"/> 
                        <input type="submit" value="Update profile" class="block bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer mt-2 mb-2 hover:bg-blue-700" name="update_profile"/>
                    </form>
                </div>
                
            </div>
</div>
                <?php
            }
        ?>
    </div>
    <?php include '../components/user_footer.php' ?>
    <script src="../assets/js/header.js"></script>
</body>
</html>