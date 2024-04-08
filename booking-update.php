<?php
include_once('connection.php');
$id = "";
$name = "";
$phone = "";
$date = "";
$time = "";
$people = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: /Final_Project/admin.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM Booking WHERE Booking_ID=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: /Final_Project/admin.php");
        exit;
    }
    $name = $row["Customer_Name"];
    $phone = $row["Phone"];
    $date = $row["Date"];
    $time = $row["Time"];
    $people = $row["Number_Of_People"];
} else {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];

    if (empty($id) || empty($name) || empty($phone) || empty($date) || empty($time) || empty($people)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "UPDATE Booking SET Customer_Name='$name', Phone='$phone', Date='$date', Time='$time', Number_Of_People='$people' WHERE Booking_ID=$id";
        $result = $conn->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
        } else {
            $successMessage = "Booking updated successfully";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking Data</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body style="background-color: black; color:white">
    <div class="container my-5">
        <h2 style="text-align: center;">Update Data</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
            ";
        }
        ?>
        <br>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Time</label>
                <div class="col-sm-6">
                    <input type="time" name="time" class="form-control" value="<?php echo $time; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Number of people</label>
                <div class="col-sm-6">
                    <input type="number" name="people" class="form-control" value="<?php echo $people; ?>">
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                            </div>
                        </div>
                    </div>
                ";
                header("refresh:1;url=/Final_Project/admin.php");
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="admin.php" class="btn btn-outline-warning" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
