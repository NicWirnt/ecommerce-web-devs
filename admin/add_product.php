<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Add New Product</p>
<?php 
    include("../config/connect.php");
    include("index.php");
    $conn = OpenCon();
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST['ProductId'];
        $name = $_POST['ProductName'];
        $description = $_POST['ProductDescription'];
        $suplierId = $_POST['supplier'];
        $availability = $_POST['ProductAvailable'];
        $cat = $_POST['category'];
        $instock = $_POST['UnitInStock'];
        $size = $_POST['AvailableSize'];
        $price = $_POST['UnitPrice'];
        try {
            $insert = $conn->prepare("INSERT INTO `products`(`ProductName`, `ProductDescription`, 
            `SupplierId`, `CategoryId`, `UnitPrice`, 
            `AvailableSize`, `UnitInStock`, `ProductAvailable`) VALUES (?,?,?,?,?,?,?,?);");
            $insert->execute([$name, $description, $suplierId, $cat, $price, $size, $instock, $availability]);
            header("location: products.php");

        } catch (\Throwable $th) {
            echo $th;
        }
    }
    if(isset($_SESSION['admin_id'])){ ?>
<div class="max-w-ex p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <form action="add_product.php" method="POST">
    <div class="relative z-0 w-full mb-6 group" style="display: none;">
    <input type="text" name="ProductId" id="id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
    <label for="ProductId" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Name</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="ProductName" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Name</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="ProductDescription" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Description</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Status</label>
        <div class="flex items-center mb-4">
            <input value="1" id="available" type="radio" name="ProductAvailable" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Available</label>
        </div>
        <div class="flex items-center mb-4">
            <input value="0" id="available" type="radio" name="ProductAvailable" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">UnAvailable</label>
        </div>

    <div class="relative z-0 w-full mb-6 group">
        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unit In Stock</label>
        <input type="number" min="0" max="100" name="UnitInStock" id="stock" class="block py-2.5 px-0 w-smtext-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
    </div>
    </div>  
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="AvailableSize" id="AvailableSize" class="block py-2.5 px-0 w-sm text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
        <label for="size" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Available Size</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="number" min="0" name="UnitPrice" id="description" class="block py-2.5 px-0 w-sm text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
    <select name="supplier" id="supplier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <?php
            $selectCat = $conn->prepare("SELECT SupplyId, CompanyName FROM `suppliers`"); 
            $selectCat->execute();
            $default = $row['SupplyId'];
            echo "<option selected='selected' value='$default'>" .$row['CompanyName']. "</option>";
            while ($rowCat = $selectCat->fetch(PDO::FETCH_ASSOC)){
                $value = $rowCat['SupplyId'];
                echo "<option value='$value'>" .$rowCat['CompanyName']. "</option>";
            }
        ?>
    </select>
        <label for="supplier" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Supplier</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
    <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <?php
            $selectCat = "SELECT CategoryId, CategoryName FROM `categories`";
            $default = $row['CategoryId'];
            echo "<option selected='selected' value='$default'>".$row['CategoryName']."</option>";
            foreach($conn->query($selectCat) as $rowCat){
                $value = $rowCat['CategoryId'];
                echo "<option value='$value'>" .$rowCat['CategoryName']. "</option>";
            }
        ?>
    </select>
        <label for="category" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
            
    </div>
    <?php
        } else{
            echo '<h2>Need admin access</h2>';
        }
        CloseCon($conn);
    ?>