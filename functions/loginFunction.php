<?php
  include_once('assets/config.php');


  function login(){
    global $con;

    if (isset($_POST['login']) && !empty($_POST['email'] && !empty($_POST['password']))) {

      $email=$_POST['email'];
      $my_password=$_POST['password'];

      
      $result = mysqli_query($con,"SELECT USER_ID FROM user_info WHERE email = '$email' AND password = '$my_password'") or die ('Ooops! Something is wrong');

      $count=mysqli_num_rows($result);
      $row=mysqli_fetch_array($result);
      // password_verify($my_password,$row['password'])

     
      if ($count > 0){
        session_start();

        $_SESSION['USER_ID']=$row['USER_ID'];
        header('location:Admin/index.php');
        
      }
      else{
        //header('location:index.php');
        echo '<div class="alert alert-danger" role="alert">
          Wrong user input.
        </div>';
      }
    }
  }


?>