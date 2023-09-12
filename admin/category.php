<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Category Details Management</p>
<?php
    
    include("../config/connect.php");
    $conn = OpenCon();
    session_start();
    if(isset($_SESSION['admin_id'])) {
        include("index.php");
        $Q = explode('=',$_SERVER['QUERY_STRING']);
        $cat_id = $Q[1];
        $select = $conn->prepare("SELECT * FROM `categories` JOIN `products`ON products.CategoryId = categories.CategoryId WHERE `ProductId` = ? LIMIT 1;");
        $select->execute([$cat_id]);
        $row = $select->fetch(PDO::FETCH_ASSOC);
        if(isset($row)) { ?>
        <div class="max-w-ex p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form action="update_category.php" method="POST">
    <div class="relative z-0 w-full mb-6 group" style="display: none;">
    <input type="text" value="<?php echo htmlspecialchars($row['CategoryId']);?>" name="CategoryId" id="id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
    <label for="CategoryId" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category Id</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" value="<?php echo htmlspecialchars($row['CategoryName']);?>" name="CategoryName" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="CategoryName" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category Name</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" value="<?php echo htmlspecialchars($row['CategoryDescription']); ?>" name="CategoryDescription" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category Description</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Status</label>
        <div class="flex items-center mb-4">
            <input <?php if (isset($row['Active']) && $row['Active']=="1") echo "checked";?> value="1" id="available" type="radio" name="Status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
        </div>
        <div class="flex items-center mb-4">
            <input <?php if (isset($row['Active']) && $row['Active']=="0") echo "checked";?> value="0" id="available" type="radio" name="Status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">InActive</label>
        </div>
    </div>
    
    <!-- <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src=<?=$row['Picture'] ?> alt="" />
        </a>
    </div> -->

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
            
        </div>
        
        <?php
        }
    } else{
        echo '<h2>Need admin access</h2>';
    };

    CloseCon($conn);

?>








