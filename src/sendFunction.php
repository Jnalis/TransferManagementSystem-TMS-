<?php
//Database Configuration File
require_once('../../config/config.php');
error_reporting(0);

function register()
{
  global $conn;

  if (isset($_POST['submit'])) {

    $firstname = ucfirst(stripslashes($_POST['firstname']));
    $middlename = ucfirst(stripslashes($_POST['middlename']));
    $surname = ucfirst(stripslashes($_POST['surname']));
    $gender = $_POST['gender'];
    $yob = stripslashes($_POST['yob']);
    $phone = stripslashes($_POST['phone']);
    $email = stripslashes($_POST['email']);
    $workPlace = ucfirst(stripslashes($_POST['workPlace']));
    $role = 'workers';
    $password = stripslashes($_POST['password']);
    $confirmpassword = stripslashes($_POST['confirmPassword']);

    // Query for validation of username and email-id
    $ret = "SELECT * FROM user_info where (email=:email)";
    $queryt = $conn->prepare($ret);
    $queryt->bindParam(':email', $email, PDO::PARAM_STR);
    $queryt->execute();

    $results = $queryt->fetchAll(PDO::FETCH_OBJ);
    if ($queryt->rowCount() == 0) {
      $pass = password_hash($password, PASSWORD_DEFAULT);
      // Query for Insertion
      $sql = "INSERT INTO user_info (firstname,middlename,surname,gender,yob,email,phone,workPlace,role,password) VALUES ('$firstname','$middlename', '$surname', '$gender', '$yob', '$email', '$phone', '$workPlace', '$role', '$pass')";

      $query = $conn->prepare($sql);
      // Binding Post Values
      $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
      $query->bindParam(':middlename', $middlename, PDO::PARAM_STR);
      $query->bindParam(':surname', $surname, PDO::PARAM_STR);
      $query->bindParam(':gender', $gender, PDO::PARAM_INT);
      $query->bindParam(':yob', $yob, PDO::PARAM_STR);
      $query->bindParam(':email', $email, PDO::PARAM_STR);
      $query->bindParam(':phone', $phone, PDO::PARAM_STR);
      $query->bindParam(':workPlace', $workPlace, PDO::PARAM_STR);
      $query->bindParam(':role', $role, PDO::PARAM_STR);
      $query->bindParam(':password', $password, PDO::PARAM_STR);
      $query->execute();

      $lastInsertId = $conn->lastInsertId();
      if ($lastInsertId) {
        header("location:../index.php");
        exit;
      } else {
        echo "Something went wrong.Please try again";
      }
    } else {
      echo "Username or Email-id already exist. Please try again";
    }
  }
}

function postSend()
{
  global $conn;

  if (isset($_POST['save'])) {

    $transfer_title = ucfirst(stripslashes($_POST['transfer_title']));
    $user = $_SESSION['user'];
    $place_to_go = ucfirst($_POST['place_to_go']);

    $file = $_FILES['file']['name'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSizeInMB = ($_FILES['file']['size']) / (1024 * 1024);
    $fileError = $_FILES['file']['error'];

    $fileExt = explode('.', $fileName);
    $fileName2 = $fileExt[0];
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        // echo $fileSize;
        // die();
        if ($fileSizeInMB < 4) {

          $fileNameNew = uniqid($fileName2, true) . "." . $fileActualExt;
          $fileDestination = '../uploads/' . basename($fileName2 . $fileNameNew);

          $query = $conn->prepare("INSERT INTO user_transfers (user_id,transfer_title,file,place_to_go) VALUES ('$user','$transfer_title','$fileNameNew','$place_to_go')");

          $query->bindParam(':transfer_title', $transfer_title, PDO::PARAM_STR);
          $query->bindParam(':file', $fileNameNew, PDO::PARAM_STR);
          $query->bindParam(':place_to_go', $place_to_go, PDO::PARAM_STR);
          $stmt = $query->execute();

          if ($stmt && move_uploaded_file($fileTmpName, $fileDestination)) {
            echo '
              <script type=\'text/javascript\'> document.location = \'viewMyTransfer.php\'; </script>;
              <div class="alert alert-success" role="alert">
                Post Added Successfully
              </div>';
          } else {
            echo mysqli_error($conn);
          }
        } else {
          echo 'Your file is too big!';
        }
      } else {
        echo 'There was a problem uplodiang your file!';
      }
    } else {
      echo 'You can not upload a file of this type!';
    }
  }
}

function postSendWorker()
{
  global $conn;

  if (isset($_POST['save'])) {

    $transfer_title = ucfirst(stripslashes($_POST['transfer_title']));
    $user = $_SESSION['user'];
    $place_to_go = ucfirst($_POST['place_to_go']);

    $file = $_FILES['file']['name'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSizeInMB = ($_FILES['file']['size']) / (1024 * 1024);
    $fileError = $_FILES['file']['error'];

    $fileExt = explode('.', $fileName);
    $fileName2 = $fileExt[0];
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        // echo $fileSize;
        // die();
        if ($fileSizeInMB < 4) {

          $fileNameNew = uniqid($fileName2, true) . "." . $fileActualExt;
          $fileDestination = '../uploads/' . basename($fileName2 . $fileNameNew);

          $query = $conn->prepare("INSERT INTO user_transfers (user_id,transfer_title,file,place_to_go) VALUES ('$user','$transfer_title','$fileNameNew','$place_to_go')");

          $query->bindParam(':transfer_title', $transfer_title, PDO::PARAM_STR);
          $query->bindParam(':file', $fileNameNew, PDO::PARAM_STR);
          $query->bindParam(':place_to_go', $place_to_go, PDO::PARAM_STR);
          $stmt = $query->execute();

          if ($stmt && move_uploaded_file($fileTmpName, $fileDestination)) {
            echo '
              <script type=\'text/javascript\'> document.location = \'index.php\'; </script>;
              <div class="alert alert-success" role="alert">
                Post Added Successfully
              </div>';
          } else {
            echo mysqli_error($conn);
          }
        } else {
          echo 'Your file is too big!';
        }
      } else {
        echo 'There was a problem uplodiang your file!';
      }
    } else {
      echo 'You can not upload a file of this type!';
    }
  }
}

function editPost()
{
  global $conn;

  if (isset($_POST['edit'])) {

    $transfer_title = ucfirst(stripslashes($_POST['transfer_title']));
    $place_to_go = ucfirst($_POST['place_to_go']);
    $post_id = $_GET['id'];

    $query = $conn->prepare("UPDATE user_transfers SET transfer_title = '$transfer_title', place_to_go = '$place_to_go' WHERE transfer_id = $post_id");
    $query->execute();


    if ($query) {
      echo "
      <script type='text/javascript'> document.location = 'viewMyTransfer.php'; </script>;
        <div class=\"alert alert-success\" role=\"alert\">
          Modification done Successfully
        </div>";
    } else {
      echo mysqli_error($conn);
    }
  }
}

function editPostWorker()
{
  global $conn;

  if (isset($_POST['edit'])) {

    $transfer_title = ucfirst(stripslashes($_POST['transfer_title']));
    $place_to_go = ucfirst($_POST['place_to_go']);
    $post_id = $_GET['id'];

    $query = $conn->prepare("UPDATE user_transfers SET transfer_title = '$transfer_title', place_to_go = '$place_to_go' WHERE transfer_id = $post_id");
    $query->execute();


    if ($query) {
      echo "
      <script type='text/javascript'> document.location = 'index.php'; </script>;
        <div class=\"alert alert-success\" role=\"alert\">
          Modification done Successfully
        </div>";
    } else {
      echo mysqli_error($conn);
    }
  }
}

function deletePost()
{
  global $conn;

  if (isset($_GET['id'])) {
    $transfer_id = $_GET['id'];
    $query = $conn->prepare("DELETE FROM user_transfers WHERE TRANSFER_ID = '$transfer_id'");
    $stmt = $query -> execute();
    if ($stmt) {
      // header("location:viewMyPost.php");
      echo "<script type='text/javascript'> document.location = 'viewMyTransfer.php'; </script>";
    } else {
      echo 'Failed to delete';
    }
  } else {
    echo 'no record';
  }
}

function deletePostWorker()
{
  global $conn;

  if (isset($_GET['id'])) {
    $transfer_id = $_GET['id'];
    $query = $conn->prepare("DELETE FROM user_transfers WHERE TRANSFER_ID = '$transfer_id'");
    $stmt = $query -> execute();
    if ($stmt) {
      // header("location:viewMyPost.php");
      echo "<script type='text/javascript'> document.location = 'viewMyTransfer.php'; </script>";
    } else {
      echo 'Failed to delete';
    }
  } else {
    echo 'no record';
  }
}
