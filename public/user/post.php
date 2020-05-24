<?php
error_reporting(E_ALL);
require('../../config/config.php');
require('../../src/sessionToBeRequired.php');
require_once('../../src/sendFunction.php');

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
            <h1 class="h3 mb-0 text-gray-800">Create a post</h1>

          </div>

          <!-- Content Row -->
          <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
            <?php postSendWorker(); ?>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="title">Title of Transfer</label>
              <div class="col-sm-10">
                <input type="text" name="transfer_title" class="form-control" id="title" placeholder="Enter Title" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="document">Document</label>
              <div class="col-sm-10">
                <input type="file" name="file" id="document">
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="title">Place you want to go</label>
              <div class="col-sm-10">
                <small>Please follow this format of district,region eg: ubungo,dar es salaam NOTE:shortform of region or district names is disallowed</small>
                <input type="text" name="place_to_go" class="form-control" id="title" placeholder="Enter place to go.." required>
              </div>
            </div>

            <div class="form-group row">
              <button type="submit" name="save" class="btn btn-primary btnSubmit">Save</button>
            </div>


          </form>
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