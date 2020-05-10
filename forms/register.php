<?php

  include_once('../assets/config.php');
  include_once('../functions/sendFunction.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('../includes/metaTags.php') ?>
  <title>TTMS - Register</title>
  <!-- Custom fonts for this template-->
  <link href="../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../styles/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Coustom styles after editing -->
  <link href="../styles/mystyle.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
            <p class="message">
              TEACHER TRANSFER MANAGEMENT SYSTEM
            </p>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create your account</h1>
              </div>
              <form class="user" method="POST" action="">
                <?php register(); ?>

                <div class="form-group">
                  <input type="text" name="firstName" class="form-control form-control-user" id="firstName" required placeholder="First Name">
                </div>
               
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="middleName" class="form-control form-control-user" id="middleName" required placeholder="Middle Name">
                  </div>

                  <div class="col-sm-6">
                    <input type="text" name="surName" class="form-control form-control-user" id="SurName" required placeholder="Surname">
                  </div>
                </div>



                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="phoneNumber" class="form-control form-control-user" id="phoneNumber" required placeholder="Phone Number">
                  </div>

                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control form-control-user" id="email" required placeholder="Email">
                  </div>
                </div>



                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" required placeholder="Password">
                  </div>


                  <div class="col-sm-6">
                    <input type="password" name="confirmPassword" class="form-control form-control-user" id="exampleRepeatPassword"
                      required placeholder="Repeat Password">
                  </div>
                </div>

                <input type="submit" value="Register Account" name="submit" class="btn btn-primary btn-user btn-block">
              </form>

              <hr>

              <div class="text-center">
                <a class="forgot-password" href="forgot-password.html">Forgot Password?</a>
              </div>


              <div class="text-center">
                <a class="create-account" href="../index.php">Already have an account? Login!</a>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../styles/vendor/jquery/jquery.min.js"></script>
  <script src="../styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../styles/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../styles/js/sb-admin-2.min.js"></script>
</body>

</html>