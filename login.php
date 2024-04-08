<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin') {
        header("Location: admin.php");
        exit();
    } else {
        echo '<script>alert("Invalid Login");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
  <header>
    <div id="intro" class="bg-image shadow-2-strong d-block w-100" style="background-image: url(images/icecream.jpeg);background-position: center; height: 100vh; width: 200vh;">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-dark rounded-5 shadow-5-strong p-5 text-white" method="post">
                <h3 style="text-align: center; padding-bottom: 10px;">Login</h3>
                <div class="form-outline mb-4">
                  <input type="text" id="username" class="form-control" placeholder="Username" name="username"/>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control" placeholder="Password" name="password"/>
                </div>
                <button type="submit" class="btn btn-warning" style="width: 100%; margin-bottom:10px" id="btnLogin">Login</button>
                <a href="index.php" class="btn btn-outline-warning" style="width: 100%;">Back To Homepage</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</body>
</html>