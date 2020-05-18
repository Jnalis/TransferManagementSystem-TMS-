<?php
  include('../assets/config.php');

  function register(){
    global $con;

    if(isset($_POST['submit'])){
      
      $firstname = ucfirst(stripslashes(mysqli_real_escape_string($con,$_POST['firstname'])));
      $middlename = ucfirst(stripslashes(mysqli_real_escape_string($con,$_POST['middlename'])));
      $surname = ucfirst(stripslashes(mysqli_real_escape_string($con,$_POST['surname'])));
      $gender = mysqli_real_escape_string($con,$_POST['gender']);
      $yob = stripslashes(mysqli_real_escape_string($con,$_POST['yob']));
      $phonenumber = stripslashes(mysqli_real_escape_string($con,$_POST['phone']));
      $email = stripslashes(mysqli_real_escape_string($con,$_POST['email']));
      $workPlace = ucfirst(stripslashes($_POST['workPlace']));
      $role = 'workers';
      $password = stripslashes(mysqli_real_escape_string($con,$_POST['password']));
      $confirmpassword = stripslashes(mysqli_real_escape_string($con,$_POST['confirmPassword']));

      $query = mysqli_query($con,"INSERT INTO user_info (firstname,middlename,surname,gender,yob,phone,email,workPlace,ROLE,password) VALUES ('$firstname','$middlename', '$surname', '$gender', '$yob', '$phonenumber', '$email', '$workPlace', '$role', '$password')");

      if ($query) {
        header("location:../index.php");
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
      }
      
    }
  }


  function postSend(){
    global $con;

    if(isset($_POST['save'])){

      $transfer_title = ucfirst(stripslashes(mysqli_real_escape_string($con,$_POST['transfer_title'])));
      $user_id = $_SESSION['user_id'];
      $place_to_go = ucfirst(mysqli_real_escape_string($con,$_POST['place_to_go']));

      $file = $_FILES['file']['name'];
      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSizeInMB = ($_FILES['file']['size']) / (1024*1024);
      $fileError = $_FILES['file']['error'];

      $fileExt = explode('.',$fileName);
      $fileName2 = $fileExt[0];
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg','jpeg','png','pdf');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) { 
          // echo $fileSize;
          // die();
          if ($fileSizeInMB < 4) {

            $fileNameNew = uniqid($fileName2, true).".".$fileActualExt;
            $fileDestination = '../uploads/'.basename($fileName2.$fileNameNew);

            $query = mysqli_query($con,"INSERT INTO user_transfers (user_id,transfer_title,file,place_to_go) VALUES ('$user_id','$transfer_title','$fileNameNew','$place_to_go')");


            if($query && move_uploaded_file($fileTmpName, $fileDestination)){
              echo '
                <div class="alert alert-success" role="alert">
                  Post Added Successfully
                </div>';
            }
            else{
              echo mysqli_error($con);
            }
            
          } else {
            echo 'Your file is too big!';
          }
          
        } else{
          echo 'There was a problem uplodiang your file!';
        }
      } else{
        echo 'You can not upload a file of this type!';
      }
    }
  }
  

  function editPost(){
    global $con;

    if(isset($_POST['edit'])){
      
      $transfer_title = ucfirst(stripslashes(mysqli_real_escape_string($con,$_POST['transfer_title'])));
      $place_to_go = ucfirst(mysqli_real_escape_string($con,$_POST['place_to_go']));
      $post_id = $_GET['id'];

      $query = mysqli_query($con,"UPDATE user_transfers SET transfer_title = '$transfer_title', place_to_go = '$place_to_go' WHERE transfer_id = $post_id");

      if($query){
        echo '
        <div class="alert alert-success" role="alert">
          Modification done Successfully
        </div>';
        }
        else{
        echo mysqli_error($con);
        }
    }

  }

  function deletePost(){
    global $con;

    if(isset($_GET['id'])){
      $transfer_id = $_GET['id'];
      $query = mysqli_query($con,"SELECT * FROM user_transfers WHERE TRANSFER_ID = '$transfer_id'");
      if($query){
        $deleteQuery = mysqli_query($con,"DELETE FROM user_transfers WHERE TRANSFER_ID = '$transfer_id'");
        if($deleteQuery){
          // header("location:viewMyPost.php");
          echo("<script>
            location.href = 'index.php';
          </script>");
        }
        else{
          echo 'Failed to delete';
        }
      }
      else{
        echo 'no record';
      }
    }
    
  }



?>