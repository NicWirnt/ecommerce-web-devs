<?php
    include '../config/connect.php';

    session_start();
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
                <p><a href="/ass2/pages/index.php" class="text-blue-500">HOME  > </a>SIGN UP</p>
                <p class="font-bold text-4xl">Sign Up</p>
            </div>
        </div>
        <?php include '../components/signup_form.php' ?>
    </div>

    <?php include '../components/user_footer.php' ?>
</body>
</html>