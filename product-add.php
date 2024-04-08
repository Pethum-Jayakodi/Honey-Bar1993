<?php
include_once('connection.php');

$errorMessage = "";
$successMessage = "";

if(isset($_POST['submit'])){
    $productName=$_POST['productName'];
    $price=$_POST['price'];
    $image=$_FILES['image']['name'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder='uploads/'.$image;

    if(empty($productName) || empty($price) || empty($image)){
        $errorMessage = "All the fields are required";
    }else{
        $query = "INSERT INTO Product(productImage,productName,price) VALUES('$image','$productName','$price')";
        $result = $conn->query($query);
        if($result){
            move_uploaded_file($image_tmp_name,$image_folder);
            $successMessage = 'Product added successfully';
            echo "<script>
                    alert('$successMessage');
                    window.location.href = 'admin.php';
                </script>";
            header("Location: index.php?productName=$productName&price=$price&image=$image");
            exit();
        }
        else{
            $errorMessage = 'Could not add the product';
            echo "<script>
                    alert('$errorMessage');
                    window.location.href = 'admin.php';
                </script>";
            exit();
        }
    }
}
