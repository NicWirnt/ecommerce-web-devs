<?php
   include("../config/connect.php");
   $conn = OpenCon();
   echo "Connected Successfully";
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    if (empty($_POST['email'])) {
       $errEmail = 'Please enter your email';
    }
    if (empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
       $errPass = 'Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit';
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
       $email = $_POST['email'];
       $mypassword = $_POST['password'];

       $select = $conn->prepare("SELECT `id` FROM `Admin` WHERE `Email` = :Email AND `pass` = :pass LIMIT 1;");
       $select->execute(array(':Email' => $email, ':pass' => $mypassword));
       $row = $select->fetch(PDO::FETCH_ASSOC);
       if (!empty($row)) {//Row found
        header("location: welcome.php");
      } else {//NO row found
          echo "Your Login Name or Password is invalid";
      }
       
    }  
 }
   CloseCon($conn);
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
<div id="login-form-container" class="w-100vw">
            <div id="login-form" class="w-full flex items-center justify-center">
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10 col-md-3">
          <input type="email" class="input-form-login" id="inputEmail" name="email" placeholder="Email">
          <?php if(isset($errEmail)) echo $errEmail; ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10 col-md-3">
          <input type="password" class="input-form-login" id="inputPassword" name="password" placeholder="Password">
          <?php if(isset($errPass)) echo $errPass; ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <input type="submit" value="Login" name="submit" class="block bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer mt-2 mb-2 hover:bg-blue-700"/>
        </div>
      </div>
    </form>
              </div>
</div>
    
  </div>
</body>
</html>

