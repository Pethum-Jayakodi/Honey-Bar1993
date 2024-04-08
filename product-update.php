<?php
include_once('connection.php');

$errorMessage = "";
$successMessage = "";

$productIdToUpdate = $_POST['productId'];
$newProductName = $_POST['productName'];
$newPrice = $_POST['price'];

$image = $_FILES['newImage']['name'];
$targetFileName = 'uploads/' . $image;

$sqlSelectImage = "SELECT productImage FROM Product WHERE productId = $productIdToUpdate";
$result = $conn->query($sqlSelectImage);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $existingImage = 'uploads/'.$row['productImage'];
    if ($existingImage != '') {
        unlink($existingImage);
    }
}

if (empty($newProductName) || empty($newPrice) || empty($image)) {
    $errorMessage = "All the fields are required";
} else {
    $sql = "UPDATE Product SET productImage = '$image', productName = '$newProductName', price = $newPrice WHERE productId = $productIdToUpdate";
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['newImage']['tmp_name'], $targetFileName);
        $successMessage = "Record updated successfully.";
        echo "<script>
                alert('$successMessage');
                window.location.href = 'admin.php';
            </script>";
    } else {
        $errorMessage = "Error updating record: " . $conn->error;
        echo "<script>
            alert('$errorMessage');
            window.location.href = 'admin.php';
        </script>";
    }
}
$conn->close();
?>
