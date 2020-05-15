<?php
require('../assets/config.php');
require('../includes/session.php');

$result = mysqli_query($con, "SELECT * FROM user_transfers WHERE USER_ID = $USER_ID ORDER BY TRANSFER_ID DESC");

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

    <!-- Sidebar -->
    <?php include_once('../includes/workers_includes/sidebar.php'); ?>
    <!-- End of Sidebar -->

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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- card to show the total number of posts available -->
            <div class="col-xl-4 col-md-7 mb-4"></div>
            <div class="col-xl-4 col-md-7 mb-4">
              <div class="card cardIndex shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs">
                        <?php
                        if (!$count > 0) {
                          echo '<small class="alert alert-danger">YOU DONT HAVE ANY TRANSFER</small>';
                        } else {
                          echo $count . '<small>Available Posts view them below</small>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4"></div>

            <?php
            if (!$count > 0) {
              echo '<a href="post.php" class="btn btn-primary">Go to Post</a>';
            } else {
              while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="col-lg-2"></div>
                <div class="col-lg-9">
                  <!-- Basic Card Example -->
                  <!-- the anchor tag has a php inside just to pass it to the url and its more dynamic to access data from db -->
                  <a href="viewTransfer.php?id=<?php echo $row['TRANSFER_ID']; ?>" id="moreInfo" class="test-zali">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="titleHead">
                          <?php echo strtoupper($row['TRANSFER_TITLE']); ?>
                        </h6>
                      </div>
                      <div class="card-body cardText">
                        <p>
                          I have attached the following document
                          <br>
                          place to show files
                          <p class="doc">
                            <?php
                            // echo "<iframe src=\"../uploads/".$row['FILE']."\" width=\"100%\" style=\"height:100%\"></iframe>";
                            echo $row['FILE']; ?>
                          </p>
                        </p>

                        <p class="dateInfoDetailed">
                          <small>
                            Created at <?php echo $row['CREATED_AT']; ?>
                          </small>
                        </p>
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-1"></div>
            <?php }
            } ?>



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