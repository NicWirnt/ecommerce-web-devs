<div class="grid gap-1" style="margin: 2rem 5rem;">
    <p class="text-sky-400">Order Details Management</p>
<?php
    
    include("../config/connect.php");
    include("index.php");
    $conn = OpenCon();
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CategoryId = $_POST['CategoryId'];
        $name = $_POST['CategoryName'];
        $description = $_POST['CategoryDescription'];
        $active = $_POST['Status'];
        try {
            $insert = $conn->prepare("UPDATE `categories` SET `CategoryName` = ?, `CategoryDescription` = ?, 
            `Active` = ? WHERE `CategoryId` = ?");
        $insert->execute([$name, $description, $active, $CategoryId]);
        header("location: categories.php");

        } catch (\Throwable $th) {
            echo $th;
        }
        
    } else {
        echo "Updated Categories Not Found";
    }
?>