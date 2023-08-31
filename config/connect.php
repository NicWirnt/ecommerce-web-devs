<?php
    
    function OpenCon()
    {
        $db_name = 'mysql:host=localhost;dbname=store';
        $user_name = 'root';
        $user_password = '';
        try {
            $conn = new PDO($db_name, $user_name, $user_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
    
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
        
    }
    
    function CloseCon($conn)
    {
        return $conn = null;
    }
?>