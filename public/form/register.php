<?php
error_reporting(E_ALL);
require_once('../../src/sendFunction.php');
require_once('../../config/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once('../../resources/metaTags.php') ?>
  <title>TMS - Register</title>
    <!-- a new cdn bootstrap -->
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../resources/styles/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Coustom styles after editing -->
  <link href="../../resources/styles/mystyle.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-8 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">TMS - Registration</h1>
                  </div>
                  <form class="user" method="POST" action="">
                    <?php register(); ?>

                    <!-- FIRST NAME -->
                    <div class="form-group">
                      <input type="text" name="firstname" pattern="[a-zA-Z\s]+" title="Full name must contain letters only.[a-zA-Z\s]+ are not required" class="form-control form-control-user" required placeholder="First Name">
                    </div>

                    <!-- MIDDLENAME AND SURNAME -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="middlename" pattern="[a-zA-Z\s]+" title="Middlename must contain letters only.[a-zA-Z\s]+ are not required" class="form-control form-control-user" required placeholder="Middle Name">
                      </div>

                      <div class="col-sm-6">
                        <input type="text" name="surname" pattern="[a-zA-Z\s]+" title="Surname must contain letters only.[a-zA-Z\s]+ are not required" class="form-control form-control-user" required placeholder="Surname">
                      </div>
                    </div>

                    <!-- GENDER AND YOB -->
                    <div class="form-group row">
                      <div class="custom-control custom-radio col-sm-6 mb-3 mb-sm-0">
                        <div class="form-group row">
                          <div class="col-sm-3 radio_buttons">
                            <input type="radio" name="gender" class="custom-control-input form-control form-control-user" id="Male" value="Male" required>
                            <label class="custom-control-label" for="Male">Male</label>
                          </div>
                          <div class="col-sm-3 radio_buttons">
                            <input type="radio" name="gender" class="custom-control-input form-control form-control-user" id="Female" value="Female" required>
                            <label class="custom-control-label" for="Female">Female</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <input type="text" name="yob" class="form-control form-control-user" required placeholder="Year of Birth">
                      </div>
                    </div>

                    <!-- NUMBER AND EMAIL -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="phone" id="mobilenumber" pattern="[0-9]{10}" maxlength="10" title="10 numeric digits only" class="form-control form-control-user" required placeholder="Phone Number">
                      </div>

                      <div class="col-sm-6">
                        <input type="email" name="email" id="email" onBlur="checkEmailAvailability()" class="form-control form-control-user" required placeholder="Email">
                        <!-- Message for Email availability-->
                        <span id="email-availability-status" style="font-size:12px;"></span>
                      </div>
                    </div>

                    <!-- CURRENT WORKING PLACE -->
                    <div class="form-group">
                      <small>Please follow this format of district,region eg: ubungo,dar es salaam NOTE:shortform of region or district names is disallowed</small>
                      <input type="text" name="workPlace" class="form-control form-control-user" required placeholder="Current Work Place">
                    </div>

                    <!-- PASSWORD AND CONFIRM PASSWORD -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" name="password" id="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 4 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" class="form-control form-control-user" required placeholder="Password">
                      </div>


                      <div class="col-sm-6">
                        <input type="password" name="confirmPassword" id="password_confirm" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '')"" class=" form-control form-control-user" required placeholder="Repeat Password">
                      </div>
                    </div>

                    <div class="controls">
                      <button class="btn btn-success btn-block" type="submit" name="submit">Register Account </button>
                    </div>
                    <!-- <input type="submit" value="Register Account" name="submit" class="btn btn-primary btn-user btn-block"> -->
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="create-account" href="../index.php">Already have an account? Login!</a>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function checkEmailAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "../../src/check_availability.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
          $("#email-availability-status").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {
          event.preventDefault();
        }
      });
    }
  </script>

<?php require_once('../../resources/assets/footer.php'); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="../../resources/styles/vendor/jquery/jquery.min.js"></script>
  <script src="../../resources/styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../resources/styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../resources/styles/js/sb-admin-2.min.js"></script>
  <!-- new cnd script -->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</body>

</html>