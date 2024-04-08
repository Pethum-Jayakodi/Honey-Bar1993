<?php
include_once('connection.php');
$name = "";
$phone = "";
$date = "";
$time = "";
$people = "";

$errorMessage = "";
$successMessage = "";

$currentDate = date("Y-m-d");
$currentTime = date("H:i");

$sql = "SELECT * FROM Product";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];

    if ($date == $currentDate && $time <= $currentTime) {
      $errorMessage = "Please select a future time.";
    }

    else if ($date < $currentDate) {
      $errorMessage = "Please select a future date.";
    }

    else if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
      $errorMessage = "Invalid name format. Please enter only alphabetic characters.";
    }

    else if (!preg_match("/^[0-9]{10}$/", $phone)) {
      $errorMessage = "Invalid phone number format. Please enter a 10-digit number.";
    }

    else if (empty($name) || empty($phone) || empty($date) || empty($time) || empty($people)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "INSERT INTO Booking (Customer_Name, Phone, Date, Time, Number_Of_People) VALUES ('$name', '$phone', '$date', '$time', '$people')";
        $result = $conn->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
        } else {
            $successMessage = "Booking inserted successfully";
            $name = "";
            $phone = "";
            $date = "";
            $time = "";
            $people = "";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <title>HONEY Bar1992</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
      <nav class="navbar navbar-expand-lg bg-black navbar-dark fixed-top rounded-bottom-5">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="logo" height="100px">
          </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                  </li>
                </ul>
                <div class="navbar-nav ml-auto">
                    <a href="login.php" class="btn btn-outline-warning">Login</a>
                </div>
                <br>
            </div>
        </nav>
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/slideFood.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/icecream.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/juice.jpeg" class="d-block w-100" alt="...">
                </div>
              </div>
            </div>
        </div>
        <br>
        <section id="welcome" class="welcome-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="welcome-img">
                            <img src="images/restaurant.jpg" alt="image" class="image-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                      <div class="welcome-text">
                        <h2>Welcome To <br><span class="text-warning">HONEY Bar1992</span></h2>
                        <p>Since 1992, we have been delighting guests with our exceptional taste and timeless elegance. Experience a world of gastronomy where traditional flavors meet innovative techniques. From carefully crafted cocktails to mouthwatering dishes, our diverse menu caters to every palate. With impeccable service and a charming atmosphere, we invite you to relax, savor, and create lasting memories. Thank you for choosing Honey Bar1992 - your ultimate destination for an extraordinary dining experience.</p>
                        <a href="#booking" class="btn btn-warning">Book a Table</a>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <div class="qt-box qt-background">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ml-auto mr-auto text-center">
                <p class="lead ">
                  " Come Hungry, Leave Happy – That's Our Promise. "
                </p>
                <span class="lead">HONEY Bar1992</span>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="menu-box" id="menu">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-title text-center">
                  <h2><span class="text-warning">Menu</span></h2>
                  <p>Savor the Selections: Discover the Gastronomic Delights on Our Menu!</p>
                </div>
              </div>
            </div>
            <br><br>
            <div class="d-flex">
              <div class="nav flex-column nav-pills">
                <button class="nav-link active" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">All</button>
                <button class="nav-link" id="v-pills-juice-tab" data-bs-toggle="pill" data-bs-target="#v-pills-juice" type="button" role="tab" aria-controls="v-pills-juice" aria-selected="false">Juice</button>
                <button class="nav-link" id="v-pills-ice-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ice" type="button" role="tab" aria-controls="v-pills-ice" aria-selected="false">Ice Cream</button>
                <button class="nav-link" id="v-pills-food-tab" data-bs-toggle="pill" data-bs-target="#v-pills-food" type="button" role="tab" aria-controls="v-pills-food" aria-selected="false">Food Items</button>
              </div>
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab" tabindex="0">
                  <div class="menu-container">
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-juice1.jpg" alt="">
                          <div class="img-text">
                            <h3>Orange Juice</h3>
                            <h5>Rs.180</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-juice2.jpg" alt="">
                          <div class="img-text">
                            <h3>Avacado Juice</h3>
                            <h5>Rs.250</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-juice3.jpg" alt="">
                          <div class="img-text">
                            <h3>Watermelon Juice</h3>
                            <h5>Rs.220</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-ice1.jpg" alt="">
                          <div class="img-text">
                            <h3>Strawberry Ice Cream</h3>
                            <h5>Rs.300</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-ice2.jpg" alt="">
                          <div class="img-text">
                            <h3>Vanilla Ice Cream</h3>
                            <h5>Rs.200</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-ice3.jpg" alt="">
                          <div class="img-text">
                            <h3>Chocolate Ice Cream</h3>
                            <h5>Rs.250</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-food1.jpg" alt="">
                          <div class="img-text">
                            <h3>Dish 1</h3>
                            <h5>Rs.1000</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-food2.jpg" alt="">
                          <div class="img-text">
                            <h3>Dish 2</h3>
                            <h5>Rs.750</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-food3.jpg" alt="">
                          <div class="img-text">
                            <h3>Dish 3</h3>
                            <h5>Rs.500</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                      <?php
                        if (isset($_GET['productName']) && isset($_GET['price']) && isset($_GET['image'])) {
                            $productName = $_GET['productName'];
                            $productPrice = $_GET['price'];
                            $productImage = $_GET['image'];
                            echo '<div class="img-area">';
                            echo '<img src="uploads/' . $productImage . '" alt="' . $productName . '">';
                            echo '<div class="img-text">';
                            echo '<h3>' . $productName . '</h3>';
                            echo '<h5>Rs.' . $productPrice . '</h5>';
                            echo '</div></div>';
                        }
                      ?>
                      </div>
    
                      <div class="col-md-4 col-sm-12">
                      <!--?php

                      $sql = "SELECT * FROM Product";
                      $result = $conn->query($sql);

                      while ($row = $result->fetch_assoc()) {
                          echo '<div class="img-area">';
                          echo '<img src="uploads/' . $row['productImage'] . '" alt="' . $row['productName'] . '">';
                          echo '<div class="img-text">';
                          echo '<h3>' . $row['productName'] . '</h3>';
                          echo '<h5>Rs.' . $row['price'] . '</h5>';
                          echo '</div></div>';
                      }
                      ?-->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="v-pills-juice" role="tabpanel" aria-labelledby="v-pills-juice-tab" tabindex="0">
                  <div class="menu-container">
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-juice1.jpg" alt="">
                          <div class="img-text">
                            <h3>Orange Juice</h3>
                            <h5>Rs.180</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-juice2.jpg" alt="">
                          <div class="img-text">
                            <h3>Avacado Juice</h3>
                            <h5>Rs.250</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-juice3.jpg" alt="">
                          <div class="img-text">
                            <h3>Watermelon Juice</h3>
                            <h5>Rs.220</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="v-pills-ice" role="tabpanel" aria-labelledby="v-pills-ice-tab" tabindex="0">
                  <div class="menu-container">
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-ice1.jpg" alt="">
                          <div class="img-text">
                            <h3>Strawberry Ice Cream</h3>
                            <h5>Rs.300</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-ice2.jpg" alt="">
                          <div class="img-text">
                            <h3>Vanilla Ice Cream</h3>
                            <h5>Rs.200</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-ice3.jpg" alt="">
                          <div class="img-text">
                            <h3>Chocolate Ice Cream</h3>
                            <h5>Rs.250</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="v-pills-food" role="tabpanel" aria-labelledby="v-pills-food-tab" tabindex="0">
                  <div class="menu-container">
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-food1.jpg" alt="">
                          <div class="img-text">
                            <h3>Dish 1</h3>
                            <h5>Rs.1000</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-food2.jpg" alt="">
                          <div class="img-text">
                            <h3>Dish 2</h3>
                            <h5>Rs.750</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="img-area">
                          <img src="images/menu-food3.jpg" alt="">
                          <div class="img-text">
                            <h3>Dish 3</h3>
                            <h5>Rs.500</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="gallery-box" id="gallery">
          <div class="gallery-container">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-title text-center">
                  <h2><span class="text-warning">Gallery</span></h2>
                  <p>Food as Art: Delight in the Stunning Displays of Our Restaurant's Gallery!</p>
                </div>
              </div>
              <br>
              <div class="col-md-4 col-sm-12">
                <div class="thumbnail">
                  <div class="single-img">
                    <img src="images/gallery-food1.jpg" alt="" class="Image">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                  <div class="single-img">
                    <img src="images/gallery-ice1.jpg" alt="" class="Image">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                  <div class="single-img">
                    <img src="images/gallery-juice1.jpg" alt="" class="Image">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="thumbnail">
                  <div class="single-img">
                    <img src="images/gallery-food2.jpg" alt="" class="Image">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                  <div class="single-img">
                    <img src="images/gallery-ice2.jpg" alt="" class="Image">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                  <div class="single-img">
                    <img src="images/gallery-juice2.jpg" alt="" class="Image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="booking-box" id="booking">
          <div class="booking-container">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-title text-center">
                  <h2><span class="text-warning">Book a Table</span></h2>
                  <p>Reserve Your Spot: Book a Table at Our Restaurant Today!</p>
                </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <img src="images/table.jpg" alt="" class="img-fluid rounded">
                  </div>
                  <div class="col-md-6" style="padding-top: 50px;">
                    <div class="row">
                      <div class="col-md-12">
                        <form method="post">
                          <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Customer Name" value="<?php echo $name; ?>">
                          </div>
                          <div class="mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $phone; ?>">
                          </div>
                          <div class="mb-3">
                            <input type="date" name="date" class="form-control" placeholder="Date" value="<?php echo $date; ?>">
                          </div>
                          <div class="mb-3">
                            <input type="time" name="time" class="form-control" placeholder="Time" value="<?php echo $time; ?>">
                          </div>
                          <div class="mb-3">
                            <input type="number" name="people" class="form-control" placeholder="Number of people" value="<?php echo $people; ?>">
                          </div>
                          <div class="col-sm-6">
                              <button type="submit" class="btn btn-warning">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="container my-5" style="border-top: 1px  solid white;">
          <footer class="text-center text-lg-start text-white">
            <div class="container p-4">
              <div class="row my-4">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                  <div class="rounded-4 bg-black shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="border: 1px solid gold;">
                    <a href="#">
                    <img src="images/logo.png" height="200px" alt=""/>
                    </a>
                  </div>
                  <p class="text-center">Seafood King Taste is Good</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0" style="padding-left: 50px;">
                  <h5 class="text-uppercase mb-4">Contact</h5>
                  <ul class="list-unstyled">
                    <li>
                      <p><i class="fas fa-map-marker-alt pe-2"></i>Circular road , Giriulla</p>
                    </li>
                    <li>
                      <p><i class="fas fa-phone pe-2"></i>+ 94 71 339 9554</p>
                    </li>
                    <li>
                      <p><i class="fas fa-envelope pe-2 mb-0"></i>honeybar@gmail.com</p>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0" style="padding-left: 50px;">
                  <h5 class="text-uppercase mb-4">Opening Hours</h5>
                  <table class="table text-center table-dark">
                    <tbody>
                      <tr>
                        <td>Mon - Thu</td>
                        <td>9 am - 10 pm</td>
                      </tr>
                      <tr>
                        <td>Friday</td>
                        <td>Closed</td>
                      </tr>
                      <tr>
                        <td>Sat - Sun</td>
                        <td>10 am - 9 pm</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0" style="padding-left: 50px;">
                  <h5 class="text-uppercase mb-4">Follow Us</h5>
                  <ul class="list-unstyled justify-content-center">
                    <li>
                      <p><i class="fab fa-facebook-square pe-2"></i>HONEY Bar1992</p>
                    </li>
                    <li>
                      <p><i class="fab fa-tiktok pe-2"></i>HONEY Bar1992</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        <?php if (!empty($errorMessage)): ?>
            alert('<?php echo $errorMessage; ?>');
        <?php elseif (!empty($successMessage)): ?>
            alert('<?php echo $successMessage; ?>');
        <?php endif; ?>
    </script>
  </body>
</html>