<?php
    include_once('connection.php');
    $name = "";
    $mobile = "";
    $email = "";
    $password = "";
    $confirmPassword = "";
    $newPassword = "";
    $confirmNewPassword = "";
    $customerCountQuery = "SELECT COUNT(*) AS customerCount FROM Customer";
    $customerCountResult = $conn->query($customerCountQuery);
    $customerCount = 0;
    if ($customerCountResult && $customerCountResult->num_rows > 0) {
        $row = $customerCountResult->fetch_assoc();
        $customerCount = $row['customerCount'];
    }
    $productCountQuery = "SELECT COUNT(*) AS productCount FROM Product";
    $productCountResult = $conn->query($productCountQuery);
    $productCount = 0;
    if ($productCountResult && $productCountResult->num_rows > 0) {
        $row = $productCountResult->fetch_assoc();
        $productCount = $row['productCount'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.16.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4ef0b79a7d.js" crossorigin="anonymous"></script>
    <style>
        .nav-pills .nav-link.active {
        background-color: gold;
        color: black;
        }

        .nav-pills .nav-link {
        color: white;
        margin-bottom: 10px;
        transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-pills .nav-link:hover {
        transform: scale(1.1);
        color: gold;
        background-color: black;
        transition: all 0.4s ease;
        }
    </style>
</head>
<body style="background-color: black; color:white;">
    <div class="container-fluid text-center py-4">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <a href="index.php">
                    <img style="width: 130px; height: 130px;" src="images/logo.png" alt="">
                </a>
                
            </div>
            <div class="col-md-10 col-sm-12 d-flex align-items-center justify-content-center">
                <h2><b>SYSTEM ADMIN DASHBOARD</b></h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex align-items-start">
                <div class="col-md-2 col-sm-6 mx-auto">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="padding-right: 10px;">
                        <button class="nav-link active text-start" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                            <i class="fa-solid fa-chart-line mr-2"></i>
                            Dashboard
                        </button>
                        <button class="nav-link text-start" id="v-pills-customers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customers" type="button" role="tab" aria-controls="v-pills-customers" aria-selected="false">
                            <i class="fa-solid fa-user-group mr-2"></i>
                            Customers
                        </button>
                        <button class="nav-link text-start" id="v-pills-products-tab" data-bs-toggle="pill" data-bs-target="#v-pills-products" type="button" role="tab" aria-controls="v-pills-products" aria-selected="false">
                            <i class="fa-solid fa-burger mr-2"></i>
                            Products
                        </button>
                        <button class="nav-link text-start" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>
                            Orders
                        </button>
                        <button class="nav-link text-start" id="v-pills-bookings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bookings" type="button" role="tab" aria-controls="v-pills-bookings" aria-selected="false">
                            <i class="fa-solid fa-book-bookmark mr-2"></i>
                            Bookings
                        </button>
                    </div>
                </div>
                <div class="col-md-10 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                            <div class="row">
                                <div class="container-fluid col-md-3 col-sm-6" style="padding-bottom: 20px;">
                                    <div class="card rounded">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="card-title"><b>CUSTOMERS</b></h6>
                                                <p class="card-text"><b><?php echo $customerCount; ?></b></p>
                                            </div>
                                            <div class="rounded-circle p-2 bg-warning d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                                <i class="fa-solid fa-users fa-2xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid col-md-3 col-sm-6">
                                    <div class="card rounded">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="card-title"><b>PRODUCTS</b></h6>
                                                <p class="card-text"><b><?php echo $productCount; ?></b></p>
                                            </div>
                                            <div class="rounded-circle p-2 bg-warning d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                                <i class="fa-solid fa-utensils fa-2xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid col-md-3 col-sm-6">
                                    <div class="card rounded">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="card-title"><b>ORDERS</b></h6>
                                                <p class="card-text"></p>
                                            </div>
                                            <div class="rounded-circle p-2 bg-warning d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                                <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid col-md-3 col-sm-6">
                                    <div class="card rounded">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h6 class="card-title"><b>SALES</b></h6>
                                                <p class="card-text"></p>
                                            </div>
                                            <div class="rounded-circle p-2 bg-warning d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                                <i class="fa-solid fa-hand-holding-dollar fa-2xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>RECENT BOOKINGS</h5>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <button class="btn btn-outline-warning btn-sm font-weight-bold">SEE ALL</button>
                                    </div>
                                </div>
                                <br>
                                <table class="table text-center table-dark">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Number of People</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM Booking";
                                            $result = $conn->query($query);
                                            if (!$result) {
                                                die("Invalid query: " . $conn->error);
                                            }
                                            while($row = $result->fetch_assoc()){
                                                echo "<tr>
                                                <td>".$row["Booking_ID"]."</td>
                                                <td>".$row["Customer_Name"]."</td>
                                                <td>".$row["Phone"]."</td>
                                                <td>".$row["Date"]."</td>
                                                <td>".$row["Time"]."</td>
                                                <td>".$row["Number_Of_People"]."</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='update.php?id=$row[Booking_ID]'>Update</a>
                                                    <a class='btn btn-danger btn-sm' href='delete.php?id=$row[Booking_ID]'>Delete</a>
                                                </td>
                                            </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-customers" role="tabpanel" aria-labelledby="v-pills-customers-tab" tabindex="0">
                            <div class="container-fluid col-md-12 col-sm-12">
                                <div class="row col-4">
                                    <button type="button" class="btn btn-outline-warning font-weight-bold" data-bs-toggle="modal" data-bs-target="#popupForm1">
                                        <i class="fa-solid fa-user-plus mr-2"></i>
                                        Add new customer
                                    </button>
                                </div>
                                <div class="modal fade" id="popupForm1" tabindex="-1" aria-labelledby="popupFormLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark text-light">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title" id="popupFormLabel1"><b>ADD NEW CUSTOMER</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="customer-add.php">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Customer Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mobile" class="form-label">Mobile Number</label>
                                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?php echo $confirmPassword;?>">
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="submit" class="btn btn-warning font-weight-bold">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <table class="table text-center table-dark">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM Customer";
                                            $result = $conn->query($query);
                                            if (!$result) {
                                                die("Invalid query: " .$conn->error);
                                            }
                                            while($row = $result->fetch_assoc()){
                                                echo "<tr>
                                                <td>".$row["cusId"]."</td>
                                                <td>".$row["cusName"]."</td>
                                                <td>".$row["mobile"]."</td>
                                                <td>".$row["email"]."</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#updateCustomer".$row['cusId']."'>Update</a>
                                                    <a class='btn btn-danger btn-sm' href='customer-delete.php?id=$row[cusId]'>Delete</a>
                                                </td>
                                                </tr>";

                                                echo"<div class='modal fade' id='updateCustomer".$row['cusId']."' tabindex='-1' aria-labelledby='updateCustomerLabel".$row['cusId']."' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered'>
                                                    <div class='modal-content bg-dark text-light'>
                                                        <div class='modal-header border-0'>
                                                            <h5 class='modal-title' id='updateCustomerLabel".$row['cusId']."'><b>UPDATE CUSTOMER DETAILS</b></h5>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='post' action='customer-update.php'>
                                                                <input type='hidden' name='id' id='id' value='".$row['cusId']."'>
                                                                <div class='mb-3'>
                                                                    <label for='name' class='form-label'>Customer Name</label>
                                                                    <input type='text' class='form-control' id='name' name='name' value='".$row['cusName']."'>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='mobile' class='form-label'>Mobile Number</label>
                                                                    <input type='text' class='form-control' id='mobile' name='mobile' value='".$row['mobile']."'>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='email' class='form-label'>Email</label>
                                                                    <input type='email' class='form-control' id='email' name='email' value='".$row['email']."'>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='oldPassword' class='form-label'>Old Password</label>
                                                                    <input type='password' class='form-control' id='oldPassword' name='oldPassword' value='".$row['password']."'>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='newPassword' class='form-label'>New Password</label>
                                                                    <input type='password' class='form-control' id='newPassword' name='newPassword' value=''>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='confirmNewPassword' class='form-label'>Password</label>
                                                                    <input type='password' class='form-control' id='confirmNewPassword' name='confirmNewPassword' value=''>
                                                                </div>
                                                                <div class='modal-footer border-0'>
                                                                    <button type='submit' class='btn btn-warning font-weight-bold'>Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab" tabindex="0">
                            <div class="container-fluid col-md-12 col-sm-12">
                                <div class="row col-4">
                                    <button type="button" class="btn btn-outline-warning font-weight-bold" data-bs-toggle="modal" data-bs-target="#popupForm2">
                                        <i class="fa-solid fa-square-plus mr-2"></i>
                                        Add new product
                                    </button>
                                </div>
                                <div class="modal fade" id="popupForm2" tabindex="-1" aria-labelledby="popupFormLabel2" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark text-light">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title" id="popupFormLabel2"><b>ADD NEW PRODUCT</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data" autocomplete="off" action="product-add.php">
                                                    <div class="mb-3">
                                                        <label for="productName" class="form-label">Product Name</label>
                                                        <input type="text" class="form-control" id="productName" name="productName">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="text" class="form-control" id="price" name="price">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Image</label>
                                                        <input type="file" class="form-control" name="image" accept="image/jpg,image/jpeg,image/png">
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="submit" class="btn btn-warning font-weight-bold" name="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <table class="table text-center table-dark">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price(Rs.)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM Product";
                                            $result = $conn->query($query);
                                            if (!$result) {
                                                die("Invalid query: " .$conn->error);
                                            }
                                            while($row = $result->fetch_assoc()){
                                                echo "<tr>
                                                <td>".$row["productId"]."</td>
                                                <td><img src='uploads/".$row["productImage"]."' alt='Product Image' width='80'</td>
                                                <td>".$row["productName"]."</td>
                                                <td>".$row["price"]."</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#updateModal".$row['productId']."'>Update</a>
                                                    <a class='btn btn-danger btn-sm' href='product-delete.php?id=".$row['productId']."'>Delete</a>
                                                </td>
                                                </tr>";

                                                echo "<div class='modal fade' id='updateModal".$row['productId']."' tabindex='-1' aria-labelledby='updateModalLabel".$row['productId']."' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered'>
                                                    <div class='modal-content bg-dark text-light'>
                                                        <div class='modal-header border-0'>
                                                            <h5 class='modal-title' id='updateModalLabel".$row['productId']."'>Update Product Information</h5>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form action='product-update.php' method='POST' enctype='multipart/form-data'>
                                                                <input type='hidden' name='productId' value='".$row['productId']."'>
                                                                <div class='mb-3'>
                                                                    <label for='name' class='form-label'>Product Name</label>
                                                                    <input type='text' class='form-control' id='productName' name='productName' value='".$row['productName']."'>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='mobile' class='form-label'>Price</label>
                                                                    <input type='text' class='form-control' id='price' name='price' value='".$row['price']."'>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='' class='form-label'>Image</label>
                                                                    <br>
                                                                    <img src='uploads/".$row["productImage"]."' alt='Product Image' name='oldImage' width='100'>
                                                                    <br>
                                                                    <input type='file' class='form-control' name='newImage' accept='image/jpg,image/jpeg,image/png'>
                                                                </div>
                                                                <div class='modal-footer border-0'>
                                                                    <button type='submit' name='update_image' class='btn btn-warning font-weight-bold'>Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab" tabindex="0">
                            <div class="container-fluid col-md-12 col-sm-12">
                                <table class="table text-center table-dark">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price(Rs.)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM Product";
                                            $result = $conn->query($query);
                                            if (!$result) {
                                                die("Invalid query: " .$conn->error);
                                            }
                                            while($row = $result->fetch_assoc()){
                                                echo "<tr>
                                                <td>".$row["productId"]."</td>
                                                <td><img src='uploads/".$row["productImage"]."' alt='Product Image' width='80'</td>
                                                <td>".$row["productName"]."</td>
                                                <td>".$row["price"]."</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#orderModal".$row['productId']."'>Place Order</a>
                                                </td>
                                                </tr>";

                                                echo "
                                                <div class='modal fade' id='orderModal".$row['productId']."' tabindex='-1' aria-labelledby='orderModalLabel".$row['productId']."' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered'>
                                                  <div class='modal-content bg-dark text-light'>
                                                    <div class='modal-header border-0'>
                                                      <h5 class='modal-title' id='orderModal".$row['productId']."'>Order Information</h5>
                                                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                      <form action='place-order.php' method='POST'>
                                                        <input type='hidden' name='productId' value='".$row['productId']."'>
                                                        <div class='mb-3'>
                                                            
                                                            <label for='cusName' class='form-label'>Customer Name</label>
                                                            <select class='form-control' id='cusName' name='cusName'>
                                                                <option value=''>Select a customer</option>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class='mb-3'>
                                                          <label for='productName' class='form-label'>Product Name</label>
                                                          <input type='text' class='form-control' id='productName' name='productName' value='".$row['productName']."' readonly>
                                                        </div>
                                                        <div class='mb-3'>
                                                          <label for='qty' class='form-label'>Quantity</label>
                                                          <input type='number' class='form-control' id='qty' name='qty' min='1'>
                                                        </div>
                                                        <div class='modal-footer border-0'>
                                                          <button type='submit' name='place_order' class='btn btn-warning font-weight-bold'>Update</button>
                                                        </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              ";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-bookings" role="tabpanel" aria-labelledby="v-pills-bookings-tab" tabindex="0">
                            <div class="container-fluid col-md-12 col-sm-12">
                                <table class="table text-center table-dark">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Number of People</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM Booking";
                                            $result = $conn->query($query);
                                            if (!$result) {
                                                die("Invalid query: " . $conn->error);
                                            }
                                            while($row = $result->fetch_assoc()){
                                                echo "<tr>
                                                <td>".$row["Booking_ID"]."</td>
                                                <td>".$row["Customer_Name"]."</td>
                                                <td>".$row["Phone"]."</td>
                                                <td>".$row["Date"]."</td>
                                                <td>".$row["Time"]."</td>
                                                <td>".$row["Number_Of_People"]."</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='booking-update.php?id=$row[Booking_ID]'>Update</a>
                                                    <a class='btn btn-danger btn-sm' href='booking-delete.php?id=$row[Booking_ID]'>Delete</a>
                                                </td>
                                            </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</script>
</body>
</html>