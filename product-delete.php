<?php
    include_once('connection.php');
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        include_once('connection.php');
        
        $imageFileName = "";
        $query = "SELECT productImage FROM Product WHERE productId = $id";
        $result = $conn->query($query);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imageFileName = $row['productImage'];
            
            $imageFilePath = 'uploads/' . $imageFileName;
            if (file_exists($imageFilePath)) {
                unlink($imageFilePath);
            }
            
            $sql = "DELETE FROM Product WHERE productId = $id";
            $conn->query($sql);
        }
        
        $conn->close();
    }

    header("location: /Final_Project/admin.php");
    exit;
?>