<?php
include_once('connection.php');

$errorMessage = "";
$successMessage = "";

$customerName = $_POST['cusName'];
$productName = $_POST['productName'];
$quantity = $_POST['qty'];

$priceQuery = "SELECT price FROM Product WHERE productName = '$productName'";
$result = $conn->query($priceQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $price = $row['price'];
} else {
    echo "Product price not found.";
    exit();
}

$amount = $price * $quantity;
$status = "not paid"; 
$submittedDate = date("Y-m-d H:i:s");

$sql = "INSERT INTO orders (cusName, productName, price, qty, amount, status, date) VALUES ('$customerName', '$productName', '$price', '$quantity', '$amount', '$status', '$submittedDate')";

if ($conn->query($sql) === TRUE) {
    $successMessage = "Order placed successfully.";
    echo "<script>
        alert('$errorMessage');
        window.location.href = 'admin.php';
        </script>";
        exit();
} else {
    $errorMessage = "Error placing order: " . $conn->error;
    echo "<script>
        alert('$errorMessage');
        window.location.href = 'admin.php';
        </script>";
    exit();
}

$conn->close();
?>
