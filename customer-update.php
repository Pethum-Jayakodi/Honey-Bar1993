<?php
include_once('connection.php');
$id = "";
$name = "";
$mobile = "";
$email = "";
$oldPassword = "";
$newPassword = "";
$confirmNewPassword = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: /Final_Project/admin.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM Customer WHERE cusId=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: /Final_Project/admin.php");
        exit;
    }
    $name = $row["cusName"];
    $mobile = $row["mobile"];
    $email = $row["email"];
    $oldPassword = $row["password"];
    $newPassword = $_POST["newPassword"];
    $confirmNewPassword = $_POST["confirmNewPassword"];
} else {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmNewPassword = $_POST["confirmNewPassword"];

    if (empty($id) || empty($name) || empty($mobile) || empty($email)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "UPDATE Customer SET cusName='$name', mobile='$mobile', email='$email', password='$newPassword' WHERE cusId=$id";

        if (!empty($newPassword)) {
            if (!empty($newPassword)) {
                if ($newPassword === $confirmNewPassword) {
                    $sql .= ", password='$newPassword'";
                } else {
                    $errorMessage = "New password and confirm new password do not match";
                    echo "<script>
                    alert('$errorMessage');
                    window.location.href = 'admin.php';
                    </script>";
                    exit();
                }
            }
            $sql .= " WHERE cusId=$id";
            if (empty($errorMessage)) {
                $result = $conn->query($sql);
                if (!$result) {
                    $errorMessage = "Invalid query: " . $conn->error;
                    echo "<script>
                    alert('$errorMessage');
                    window.location.href = 'admin.php';
                    </script>";
                    exit();
                } else {
                    $successMessage = "Customer details updated successfully";
                    echo "<script>
                    alert('$successMessage');
                    window.location.href = 'admin.php';
                    </script>";
                    exit();
                }
            }
        }
    }
}
?>