<?php
error_reporting(E_ALL);
require_once('../config/config.php');
require_once('../src/requestReset.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once('../resources/metaTags.php') ?>

  <title>TMS - password reset</title>

  <!-- Custom fonts for this template-->
  <link href="../resources/styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                    <h3 style=" font-size: 30px;" class="alert alert-danger">
                      <center><strong>Forgot password?.</strong></center>
                    </h3>
                    <p style="font-size: 15px; color: black; text-align: center">
                      We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
                    </p>
                  </div>

                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" title="Please enter your Email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>

                    <div class="controls">
                      <button class="btn btn-success btn-block" type="submit" name="request">Request</button>
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