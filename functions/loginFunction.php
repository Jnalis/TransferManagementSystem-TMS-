<?php
  include_once('assets/config.php');

  function login(){
    session_start();
    global $con;

    if (isset($_POST['login'])) {

      $email = stripslashes(mysqli_real_escape_string($con,$_POST['email']));
      $password= stripslashes(mysqli_real_escape_string($con,$_POST['password']));

      
      $result = mysqli_query($con,"SELECT * FROM user_info WHERE email = '$email' AND password = '$password'") or die ('Ooops! Something is wrong');

      $count=mysqli_num_rows($result);
      
     
      if ($count == 1){
        $rows = mysqli_fetch_assoc($result);

        if ($rows['ROLE'] === 'Head of institution') {

          $_SESSION['USER_ID']=$rows['USER_ID'];
          header('location:Admin/index.php');

        } 
        elseif($rows['ROLE'] === 'workers') {

          $_SESSION['USER_ID']=$rows['USER_ID'];
          header('location:workers/index.php');

         } else{
           echo 'No such user in our database';
         }
        
      }
      else{
        //header('location:index.php');
        echo '<div class="alert alert-danger" role="alert">
          Email or Password is incorrect.
        </div>';
      }
    }
  }


?>