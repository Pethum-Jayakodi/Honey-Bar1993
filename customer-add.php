<?php
include_once('connection.php');

$name = "";
$mobile = "";
$email = "";
$password = "";
$confirmPassword = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
      $errorMessage = "Invalid name format. Please enter only alphabetic characters.";
    }
    else if (!preg_match("/^[0-9]{10}$/", $mobile)) {
      $errorMessage = "Invalid phone number format. Please enter a 10-digit number.";
    }
    else if (empty($name) || empty($mobile) || empty($email) || empty($password)) {
        $errorMessage = "All the fields are required";
    }
    else {
        $emailCheckQuery = "SELECT * FROM Customer WHERE email = '$email'";
        $emailCheckResult = $conn->query($emailCheckQuery);

        $mobileCheckQuery = "SELECT * FROM Customer WHERE mobile = '$mobile'";
        $mobileCheckResult = $conn->query($mobileCheckQuery);

        if ($emailCheckResult->num_rows > 0) {
            $errorMessage = "A customer with the same email already exists.";
            $name = "";
            $mobile = "";
            $email = "";
            $password = "";
        } 
        else if ($mobileCheckResult->num_rows > 0) {
            $errorMessage = "A customer with the same mobile number already exists.";
            $name = "";
            $mobile = "";
            $email = "";
            $password = "";
        } 
        else if ($password != $confirmPassword){
            $errorMessage = "Passwords didnot match.";
            $confirmPassword = "";
            echo "<script>
                    alert('$errorMessage');
                    window.location.href = 'admin.php';
                </script>";
        }
        else {
            $sql = "INSERT INTO Customer(cusName,mobile,email,password) VALUES ('$name', '$mobile', '$email', '$password')";
            $result = $conn->query($sql);
            if (!$result) {
                $errorMessage = "Invalid query: " . $conn->error;
                echo "<script>
                    alert('$errorMessage');
                    window.location.href = 'admin.php';
                </script>";
                exit();
            } else {
                $successMessage = "Customer added successfully";
                $name = "";
                $mobile = "";
                $email = "";
                $password = "";
                echo "<script>
                    alert('$successMessage');
                    window.location.href = 'admin.php';
                </script>";
                exit();
            }
        }
    }
}