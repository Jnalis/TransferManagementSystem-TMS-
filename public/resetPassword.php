<?php
error_reporting(E_ALL);
require_once('../config/config.php');

if (!isset($_GET['code'])) {
    exit("Can't find page");
}
$code = $_GET['code'];

$getEmailQuery = $conn->prepare("SELECT email FROM reset_password WHERE code = '$code'");
$getEmailQuery->execute();
$count = $getEmailQuery->rowCount();

if ($count == 0) {
    exit("Can't find page");
}
if (isset($_POST['password'])) {
    $pass = $_POST['password'];

    $row = $getEmailQuery -> fetch();
    //print_r($row);
    $email = $row['email'];
    $query = $conn -> prepare("UPDATE user_info SET password = '$pass' WHERE email = '$email'");
    $query -> execute();

    if ($query) {
        $query = $conn -> prepare("DELETE FROM reset_password WHERE code = '$code'");
        $query -> execute();
        header("location: index.php");
    }else {
        exit("Something went wrong");
    }
}
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
                                        <h3 style=" font-size: 30px;">
                                            <center><strong>Change your password.</strong></center>
                                        </h3>
                                    </div>

                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" pattern="^\S{4,}$" title="Please enter your password NB: password cannot contain these characters ^\S{4,}$" placeholder="New Password" required>
                                        </div>

                                        <div class="controls">
                                            <button class="btn btn-success btn-block" type="submit" name="change">Change</button>
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