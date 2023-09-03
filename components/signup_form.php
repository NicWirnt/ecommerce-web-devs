

<div id="signup-form-container" class="w-100vw">
            <div id="signup-form" class="w-full flex items-center justify-center">
                <div class="w-[50%] m-10">
                    <form class="" action="" method="post" name="signup-form">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Enter your email" name="email" required class="input-form-login"/>
                        <div class='flex flex-row'>
                            <div>
                            <label for="fName">First Name</label>
                            <input type="text" placeholder="Enter your first name" name="fName" required class="input-form-login"/>
                            </div>
                            <div>
                            <label for="lName">Last Name</label>
                            <input type="text" placeholder="Enter your last name" name="lName" class="input-form-login"/>
                            </div>
                        
                        </div>
                        <label for="adress">Address</label>
                            <input type="text" placeholder="Enter your address" name="address" required class="input-form-login"/>
                        <div class='flex flex-row'>
                            <div>
                            <label for="Country">Country</label>
                            <input type="text" placeholder="Country" name="country" required class="input-form-login"/>
                            </div>
                            <div>
                            <label for="city">City</label>
                            <input type="text" placeholder="City" name="city" required class="input-form-login"/>
                            </div>
                            <div>
                            <label for="postcode">Post Code</label>
                            <input type="text" placeholder="Post Code" name="postcode" required  class="input-form-login"/>
                            </div>
                        
                        </div>
                        <label for="phone">Phone</label>
                        <input type="number" placeholder="Enter your phone number" name="phone" required class="input-form-login"/> 
                        <label for="password">Password (min 6 character)</label>
                        <input type="password" minlength=6 placeholder="Enter your password" name="password" required class="input-form-login"/> 
                        <label for="confirmPass">Confirm your password</label>
                        <input type="password" required placeholder="Confirm your password" name="confirmPass" class="input-form-login"/> 
                        <input type="submit" value="Sign Up" class="block bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer mt-2 mb-2 hover:bg-blue-700" name="submit"/>
                        <p>Have an account? <a href="/ass2/pages/login.php" class="font-bold">Click here</a> login</p>
                    </form>
                </div>
                
            </div>
</div>