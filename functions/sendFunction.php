<?php
  include('../assets/config.php');

  function register(){
    global $con;

    if(isset($_POST['submit'])){

      $firstname = $_POST['FIRSTNAME'];
      $middlename = $_POST['MIDDLENAME'];
      $surname = $_POST['SURNAME'];
      $gender = $_POST['GENDER'];
      $yob = $_POST['YOB'];
      $phonenumber = $_POST['PHONE_NUMBER'];
      $email = $_POST['EMAIL'];
      $current_work_place = $_POST['CURRENT_WORK_PLACE'];
      $role = 'workers';
      $password = $_POST['PASSWORD'];
      $confirmpassword = $_POST['CONFIRM_PASSWORD'];

      $query = mysqli_query($con,"INSERT INTO user_info (FIRSTNAME,MIDDLENAME,SURNAME,GENDER,YOB,PHONE_NUMBER,EMAIL,CURRENT_WORK_PLACE,ROLE,PASSWORD) VALUES ('$firstname','$middlename', '$surname', '$gender', '$yob', '$phonenumber', '$email', '$current_work_place', '$role', '$password')");

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

      $TRANSFER_TITLE = ucfirst($_POST['TRANSFER_TITLE']);
      $USER_ID = $_SESSION['USER_ID'];
      $PLACE_TO_GO = ucfirst($_POST['PLACE_TO_GO']);

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

            $query = mysqli_query($con,"INSERT INTO user_transfers (USER_ID,TRANSFER_TITLE,file,PLACE_TO_GO) VALUES ('$USER_ID','$TRANSFER_TITLE','$fileNameNew','$PLACE_TO_GO')");


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
      
      $title = $_POST['title'];
      $description = $_POST['description'];
      $post_id = $_GET['id'];

      $query = mysqli_query($con,"UPDATE details SET title = '$title',description = '$description' WHERE detail_id = $post_id");

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