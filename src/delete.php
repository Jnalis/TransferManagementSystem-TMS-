<?php 
require_once('../config/config.php');

if (isset($_GET['id'])) {
    $transfer_id = $_GET['id'];
    $query = $conn->prepare("DELETE FROM user_transfers WHERE transfer_id = '$transfer_id'");
    $stmt = $query -> execute();
    if ($stmt) {
      // header("location:viewMyPost.php");
      echo '
      <script type=\'text/javascript\'> document.location = \'../public/admin/viewMyTransfer.php\'; </script>';
    } else {
      echo 'Failed to delete';
    }
  } else {
    echo 'no record';
  }
