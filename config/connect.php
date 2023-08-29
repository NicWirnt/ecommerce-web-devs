<?php
    $db_name = 'mysql:host=localhost;dbname=my_store';
    $user_name = 'root';
    $user_password = '';

    try {
        //code...
        $conn = new PDO($db_name, $user_name, $user_password);
        
        // Set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>