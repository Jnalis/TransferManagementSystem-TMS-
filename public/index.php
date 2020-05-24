<?php
error_reporting(E_ALL);
require_once('../config/config.php');
require_once('../src/login.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php require_once('../resources/metaTags.php') ?>

  <title>TMS - Login</title>

  <!-- Custom fonts for this template-->
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../resources/styles/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Coustom styles after editing -->
  <link href="../resources/styles/mystyle.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">TMS - Login</h1>
                  </div>

                  <form class="user" method="POST" action="">
                    <?php if ($message != "") { ?>
                      <div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
                    <?php } ?>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" title="Please enter your Email" aria-describedby="emailHelp" value="<?php if (isset($_COOKIE["email"])){echo $_COOKIE["email"];}?>" placeholder="Enter Email Address..." required>
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" pattern="^\S{4,}$" title="Please enter your password NB: Must have at least 4 characters" value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"  placeholder="Password" required>
                    </div>


                    <div class="form-group">
                      <div class="custom-control custom-switch small">
                        <input type="checkbox" name="remember_me" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['email'])){echo 'checked';}?>>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <div class="controls">
                      <button class="btn btn-success btn-block" type="submit" name="login">Login</button>
                    </div>


                    <div class="text-center">
                      <a class=" create-account" href="form/register.php">Create an Account!</a>
                    </div>

                    <div class="text-center">
                      <a class=" forgot-password" href="password_reset.php">Forgot Password?</a>
                      
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

  <?php require_once('../resources/assets/footer.php'); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="../resources/styles/vendor/jquery/jquery.min.js"></script>
  <script src="../resources/styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../resources/styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../resources/styles/js/sb-admin-2.min.js"></script>

</body>

</html>