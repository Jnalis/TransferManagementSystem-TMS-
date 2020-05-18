<?php
  require_once('../assets/config.php');
  require_once('../functions/sendFunction.php');
  require('../includes/sessionToBeRequired.php');

  $transfer_id = $_GET['id'];
  $result = mysqli_query($con,"SELECT * FROM user_transfers WHERE transfer_id = $transfer_id");
  $row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php require_once('../includes/metaTags.php') ?>

  <title>TMS Home</title>

  <!-- Custom fonts for this template-->
  <link href="../styles/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../styles/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- my custom css -->
  <link rel="stylesheet" href="../styles/mystyleHome.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php require_once('../includes/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

         <!-- Topbar -->
         <?php require_once('../includes/topbar.php') ?>
         <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit a post</h1>

          </div>

          <!-- Content Row -->
          <form method="POST" action="" class="form-horizontal">
            <?php editPost(); ?>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="title">Title of Transfer</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?php echo $row['transfer_title']; ?>" required>
              </div>
            </div>
            
            <!-- <div class="form-group row">
              <label class="control-label col-sm-2" for="description">Description</label>
              <div class="col-sm-10">
                <textarea id="subject" name="description" rows="10" placeholder="Write something.." required>
                  <?php echo $row['description'] ?>
                </textarea>
              </div>
            </div> -->

            <div class="form-group row">
              <label class="control-label col-sm-2" for="document">Document</label>
              <div class="col-sm-10">
              <?php 
                   // echo "<img src='../../uploads/".$row['FILE']."' class='img-thumbnail postImg'>";
                  ?>
                  <br>
                <input type="file" name="file" id="document">
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="title">Place you want to go</label>
              <div class="col-sm-10">
                <small>Please follow this format of district,region eg: ubungo,dar es salaam NOTE:shortform of region or district names is disallowed</small>
                <input type="text" name="place_to_go" class="form-control" id="title" placeholder="Enter place to go.." value="<?php echo $row['place_to_go']; ?>" required>
              </div>
            </div>

            <div class="form-group row">
              <button type="submit" name="edit" class="btn btn-primary btnSubmit">Edit</button>
            </div>


          </form>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once('../includes/footer.php'); ?>
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
  <script src="../styles/vendor/jquery/jquery.min.js"></script>
  <script src="../styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../styles/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../styles/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../styles/js/demo/chart-area-demo.js"></script>
  <script src="../styles/js/demo/chart-pie-demo.js"></script>

</body>

</html>
