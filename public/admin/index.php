<?php
require_once('../../config/config.php');
require_once('../../src/sessionToBeRequired.php');

$id = $_SESSION['user'];
$sql = $conn->prepare("SELECT ut.transfer_id,ut.user_id,ut.transfer_title,ut.file,ut.place_to_go,ut.created_at,ui.user_id,ui.firstname,ui.middlename,ui.surname,ui.workPlace FROM user_transfers AS ut INNER JOIN user_info AS ui ON ut.place_to_go = ui.workPlace WHERE $id = ui.user_id AND ut.viewed = 'NO' ORDER BY ut.transfer_id DESC");
$sql->execute();
$count = $sql->rowCount();
$rows = $sql->fetchAll();

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

    <!-- Sidebar -->
    <?php require_once('../../resources/assets/sidebar.php'); ?>
    <!-- End of Sidebar -->

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
              foreach ($rows as $row) {
                $filenamelong = explode('5', $row['file']);
                $filenameshort = $filenamelong[0];
                $fileext = explode('.', $row['file']);
                $fileextension = $fileext[2];
                $datelong = explode(' ', $row['created_at']);
                $date = $datelong[0];
            ?>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <!-- Basic Card Example -->
                  <!-- the anchor tag has a php inside just to pass it to the url and its more dynamic to access data from db -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="titleHead">
                        <?php echo strtoupper($row['transfer_title']); ?>
                      </h6>
                    </div>
                    <div class="card-body cardText">
                      <a href="viewTransfer.php?id=<?php echo $row['transfer_id']; ?>" id="moreInfo" class="test-zali">
                        <p class="doc">
                          <i class="fas fa-file-pdf pdfIcon"></i>
                          <?php echo $filenameshort . '.' . $fileextension; ?>
                        </p>
                      </a>
                    </div>
                    <div class="row dateInfoWorker">
                      <div class="col">
                        <p class="someInfo">Created at <?php echo $date; ?></p>
                      </div>
                    </div>
                  </div>

                </div>
            <?php }
            } ?>



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