<?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        include_once('connection.php');
        $sql="DELETE FROM Customer WHERE cusId=$id";
        $conn->query($sql);
    }
    header("location: /Final_Project/admin.php");
    exit;
?>