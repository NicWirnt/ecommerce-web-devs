<?php


?>

<div id="login-form-container" class="w-100vw">
            <div id="login-form" class="w-full flex items-center justify-center">
                <div class="w-[50%] m-10">
                    <form class="" action="" method="post" name="login-form">
                        <label for="username">Email</label>
                        <input type="email" placeholder="Enter your email" name="email" class="input-form-login"/>
                        <label for="password">Password</label>
                        <input type="password" placeholder="Enter your password" name="password" class="input-form-login"/> 
                        <p class="font-bold"><a href="#" id="forgotPasswordLink" >Forgot Password?</a></p>
                        <input type="submit" value="Login" class="block bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer mt-2 mb-2 hover:bg-blue-700" name="submit"/>
                        <p>Don't have an account? <a href="/ass2//pages/signup.php" class="font-bold">Click here</a> to sign up</p>
                    </form>
                </div>
            </div>
        </div>