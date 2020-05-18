<?php

  require_once('../assets/config.php');
  require_once('../functions/sendFunction.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('../includes/metaTags.php') ?>
  <title>TMS - Register</title>
  <!-- Custom fonts for this template-->
  <link href="../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
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
              TRANSFER MANAGEMENT SYSTEM
            </p>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create your account</h1>
              </div>
              <form class="user" method="POST" action="">
                <?php register(); ?>

                <!-- FIRST NAME -->
                <div class="form-group">
                  <input type="text" name="firstname" class="form-control form-control-user" required 
                  placeholder="First Name">
                </div>

                <!-- MIDDLENAME AND SURNAME -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="middlename" class="form-control form-control-user" required placeholder="Middle Name">
                  </div>

                  <div class="col-sm-6">
                    <input type="text" name="surname" class="form-control form-control-user" required placeholder="Surname">
                  </div>
                </div>

                <!-- GENDER AND YOB -->
                <div class="form-group row">
                  <div class="custom-control custom-radio col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group row">
                      <div class="col-sm-3 radio_buttons">
                        <input type="radio" name="gender" class="custom-control-input form-control form-control-user"
                        id="Male" value="Male" required>
                        <label class="custom-control-label" for="Male">Male</label>
                      </div>
                      <div class="col-sm-3 radio_buttons">
                        <input type="radio" name="gender" class="custom-control-input form-control form-control-user"
                        id="Female" value="Female" required>
                        <label class="custom-control-label" for="Female">Female</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <input type="text" name="yob" class="form-control form-control-user" required
                      placeholder="Year of Birth">
                  </div>
                </div>

                <!-- NUMBER AND EMAIL -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="phone" class="form-control form-control-user" required placeholder="Phone Number">
                  </div>

                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control form-control-user" required placeholder="Email">
                  </div>
                </div>

                <!-- CURRENT WORKING PLACE -->
                <div class="form-group">
                  <small>Please follow this format of district,region eg: ubungo,dar es salaam NOTE:shortform of region or district names is disallowed</small>
                  <input type="text" name="workPlace" class="form-control form-control-user" required 
                  placeholder="Current Work Place">
                </div>

                <!-- PASSWORD AND CONFIRM PASSWORD -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" required placeholder="Password">
                  </div>


                  <div class="col-sm-6">
                    <input type="password" name="confirmPassword" class="form-control form-control-user" required placeholder="Repeat Password">
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