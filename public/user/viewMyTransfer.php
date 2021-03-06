<?php
error_reporting(E_ALL);
require('../../config/config.php');
require('../../src/sessionToBeRequired.php');
require_once('../../src/sendFunction.php');

//Getting the single id of post from post
//$transfer_id = $_GET['id'];

$result = $conn->prepare("SELECT * FROM user_transfers WHERE user_id = $user");
$result->execute();

$stmt = $result->fetchAll();

//echo $row['description'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once('../../resources/metaTags.php') ?>

  <title>TMS Home</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../resources/styles/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- my custom css -->
  <link rel="stylesheet" href="../../resources/styles/mystyleHome.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php require_once('../../resources/assets/user/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require_once('../../resources/assets/topbar.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transfer Available</h1>

          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">

              <?php
              foreach ($stmt as $row) {
                $filenamelong = explode('5', $row['file']);
                $filenameshort = $filenamelong[0];
                $fileext = explode('.', $row['file']);
                $fileextension = $fileext[2];
                $datelong = explode(' ', $row['created_at']);
                $date = $datelong[0];

              ?>
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="titleHeadDetailed"><?php echo $row['transfer_title'] ?></h6>
                  </div>
                  <div class="card-body cardTextDetailed">
                    <?php
                    // echo "<img src='../../uploads/".$row['FILE']."' class='img-thumbnail postImg'>"; 
                    echo 'place to show files';
                    ?>
                    <p class="myPostDetailed">
                      <span class="buttons">
                        <a href="../../src/del.php?id=<?php echo $row['transfer_id']; ?>" class="btn btn-danger">Delete</a>
                        
                        <a href="editMyTransfer.php?id=<?php echo $row['transfer_id']; ?>">
                          <button class="btn btn-info">Edit</button>
                        </a>
                      </span>
                    </p>
                    <p class="dateInfoDetailed">
                      <small>
                        Created at <?php echo $row['created_at']; ?>
                      </small>
                    </p>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="col-lg-3"></div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once('../../resources/assets/footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="../../resources/styles/vendor/jquery/jquery.min.js"></script>
  <script src="../../resources/styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../resources/styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../resources/styles/js/sb-admin-2.min.js"></script>


</body>

</html>