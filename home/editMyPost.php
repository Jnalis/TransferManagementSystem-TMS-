<?php
  require_once('../assets/config.php');
  require_once('../functions/sendFunction.php');
  session_start();
  if (!isset($_SESSION['member_id'])){
  header('location:../index.php');
  }
  
  $member_id=$_SESSION['member_id'];

  $result= mysqli_query($con,"SELECT * FROM teachers WHERE member_id = '$member_id'")or die('Error');

  $row=mysqli_fetch_array($result);

  $firstName= ucfirst($row['firstName']);
  $middleName = ucfirst(substr($row['middleName'],0,1));
  $surName= strtoupper($row['surName']);

  $post_id = $_GET['id'];
  $result = mysqli_query($con,"SELECT * FROM details WHERE detail_id = $post_id");
  $row = mysqli_fetch_assoc($result);


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
            <h1 class="h3 mb-0 text-gray-800">Edit a post</h1>

          </div>

          <!-- Content Row -->
          <form method="POST" action="" class="form-horizontal">
            <?php editPost(); ?>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="title">Title of Transfer</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?php echo $row['title']; ?>" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="control-label col-sm-2" for="description">Description</label>
              <div class="col-sm-10">
                <textarea id="subject" name="description" rows="10" placeholder="Write something.." required>
                  <?php echo $row['description'] ?>
                </textarea>
              </div>
            </div>


            <div class="row">
              <input type="submit" name="edit" value="Edit">
            </div>

          </form>




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

  <!-- Page level plugins -->
  <script src="../styles/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../styles/js/demo/chart-area-demo.js"></script>
  <script src="../styles/js/demo/chart-pie-demo.js"></script>

</body>

</html>
