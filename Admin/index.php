<?php
require_once('../assets/config.php');
require('../includes/sessionToBeRequired.php');

$id = $_SESSION['user_id'];
$query = "SELECT ut.transfer_id,ut.user_id,ut.transfer_title,ut.file,ut.place_to_go,ut.created_at,ui.user_id,ui.workPlace FROM user_transfers AS ut INNER JOIN user_info AS ui ON ut.place_to_go = ui.workPlace WHERE $id = ui.user_id AND ut.viewed = 'NO' ORDER BY ut.transfer_id DESC";
$result = mysqli_query($con, $query);

$count = mysqli_num_rows($result);
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

    <!-- Sidebar -->
    <?php require_once('../includes/sidebar.php'); ?>
    <!-- End of Sidebar -->

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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>


          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- card to show the total number of posts available -->
            <div class="col-xl-4 col-md-2 col-sm-4 mb-4"></div>
            <div class="col-xl-4 col-md-8 col-sm-4 mb-4">
              <div class="card cardIndex shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs">
                        <?php echo $count; ?>
                        <small>Available Posts view them below</small>
                      </div>
                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-2 col-sm-m-4"></div>

            <?php
            if (!$count > 0) {
              echo 'There is no post yet';
            } else {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col">
                  <!-- Basic Card Example -->
                  <!-- the anchor tag has a php inside just to pass it to the url and its more dynamic to access data from db -->
                  <a href="viewTransfer.php?id=<?php echo $row['transfer_id']; ?>" id="moreInfo" class="test-zali">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="titleHead">
                          <?php echo strtoupper($row['transfer_title']); ?>
                        </h6>
                      </div>
                      <div class="card-body cardText">
                        <p>
                          I have attached the following document
                          <p class="doc">
                            <?php echo $row['file']; ?>
                          </p>
                        </p>

                        <p class="dateInfoDetailed">
                          <small>
                            Created at <?php echo $row['created_at']; ?>
                          </small>
                        </p>
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
            <?php }
            } ?>



          </div>
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


</body>

</html>