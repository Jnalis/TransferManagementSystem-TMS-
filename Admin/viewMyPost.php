<?php
  include_once('../assets/config.php');
  include_once('../functions/sendFunction.php');
  include_once('../includes/session.php');


  $result = mysqli_query($con,"SELECT * FROM user_transfers WHERE USER_ID = $USER_ID ORDER BY created_at DESC");

  $count = mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php include_once('../includes/metaTags.php') ?>

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

    <?php include_once('../includes/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

         <!-- Topbar -->
         <?php include_once('../includes/topbar.php') ?>
         <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">You Post</h1>

          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

              <!-- Basic Card Example -->
              <?php 
                if(!$count > 0){
                  echo '
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h6 class="titleHeadDetailed">You have no post</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
                  ';
                }
                else {
                  while($row=mysqli_fetch_assoc($result)){
              ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="titleHeadDetailed">
                    <?php echo $row['TRANSFER_TITLE']?>
                  </h6>
                </div>
                <div class="card-body cardTextDetailed">
                  <!-- <?php echo $row['description']?> -->


                  <p class="myPostDetailed">
                    <small>
                      Created at <?php echo $row['CREATED_AT'];?>
                    </small>
                    <span class="buttons">
                      <?php deletePost(); ?>
                      <a href="viewMyPost.php?id=<?php echo $row['TRANSFER_ID'];?>">
                        <button class="btn btn-danger">Delete</button>
                      </a>
                      
                      <a href="editMyPost.php?id=<?php echo $row['TRANSFER_ID'];?>">
                        <button class="btn btn-info">Edit</button>
                      </a>
                    </span>
                  </p>
                </div>
              </div>
                  <?php } }?>

            </div>
            <div class="col-lg-2"></div>
          </div>    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include_once('../includes/footer.php'); ?>
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


</body>

</html>
