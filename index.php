<?php
require('assets/config.php');
session_start();
require("functions/sessionFunction.php");
$message = "";
if (isset($_POST['login'])) {
  $email = stripslashes(mysqli_real_escape_string($con, $_POST['email']));
  $password = stripslashes(mysqli_real_escape_string($con, $_POST['password']));

  $result = mysqli_query($con, "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'") or die('Ooops! Something is wrong');

  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['fname'] = $row['firstname'];
    $_SESSION['mname'] = $row['middlename'];
    $_SESSION['sname'] = $row['surname'];
    $_SESSION['loggedin_time'] = time();

    
  } else {
    $message = "Invalid Username or Password!";
  }
}
if (isset($_SESSION["user_id"])) {
  if (!isLoginSessionExpired()) {
    if ($row['role'] == 'Head of institution') {
      header("Location:Admin/index.php");
    } else {
      header("Location:workers/index.php");
    }
    
  } else {
    header("Location:logout.php?session_expired=1");
  }
}

if (isset($_GET["session_expired"])) {
  $message = "Session is Expired. Please Login Again.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php include_once('includes/metaTags.php') ?>

  <title>TMS - Login</title>

  <!-- Custom fonts for this template-->
  <link href="styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="styles/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Coustom styles after editing -->
  <link href="styles/mystyle.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome in TMS</h1>
                  </div>

                  <form class="user" method="POST" action="">
                    <?php if ($message != "") { ?>
                      <div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
                    <?php } ?>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>


                    <div class="form-group">
                      <div class="custom-control custom-switch small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">

                    <div class="text-center">
                      <a class=" create-account" href="forms/register.php">Create an Account!</a>
                    </div>

                    <div class="text-center">
                      <a class=" forgot-password" href="forgot-password.html">Forgot Password?</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="styles/vendor/jquery/jquery.min.js"></script>
  <script src="styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="styles/js/sb-admin-2.min.js"></script>

</body>

</html>