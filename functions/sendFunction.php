<?php
  include('../assets/config.php');

  function register(){
    global $con;

    if(isset($_POST['submit'])){
      $firstname =mysqli_real_escape_string($con,$_POST['firstName']);
      $middlename =mysqli_real_escape_string($con,$_POST['middleName']);
      $surname =mysqli_real_escape_string($con,$_POST['surName']);
      $phonenumber =mysqli_real_escape_string($con,$_POST['phoneNumber']);
      $email =mysqli_real_escape_string($con,$_POST['email']);
      $password =mysqli_real_escape_string($con,$_POST['password']);
      $confirmpassword =mysqli_real_escape_string($con,$_POST['confirmPassword']);

      $query = mysqli_query($con,"INSERT INTO teachers (firstName,middleName,surName,phoneNumber,email,password) VALUES ('$firstname','$middlename',
      '$surname', '$phonenumber', '$email', '$password')");

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

      $target = "../uploads/".basename($_FILES['file']['name']);

      $title = ucfirst($_POST['title']);
      $member_id = $_SESSION['member_id'];
      $description = ucfirst($_POST['description']);
      $file = $_FILES['file']['name'];
      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];

      $fileExt = explode('.',$fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg','jpeg','png');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize = 1000) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = '../uploads/'.basename($fileNameNew);

            $query = mysqli_query($con,"INSERT INTO details (title,member_id,description,file) VALUES ('$title','$member_id','$description','$fileNameNew')");


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
      $post_id = $_GET['id'];
      $query = mysqli_query($con,"SELECT * FROM details WHERE detail_id = '$post_id'");
      if($query){
        $deleteQuery = mysqli_query($con,"DELETE FROM details WHERE detail_id = '$post_id'");
        if($deleteQuery){
          // header("location:viewMyPost.php");
          echo("<script>
            location.href = 'viewMyPost.php';
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