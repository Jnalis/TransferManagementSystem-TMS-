<?php
    include_once('../assets/config.php');
    session_start();
    if (!isset($_SESSION['USER_ID'])){
    header('location:../index.php');
    }
    
    $USER_ID=$_SESSION['USER_ID'];
  
    $result= mysqli_query($con,"SELECT * FROM user_info WHERE USER_ID = '$USER_ID'")or die('Error');
  
    $row=mysqli_fetch_array($result);
  
    $FIRSTNAME= ucfirst($row['FIRSTNAME']);
    $MIDDLENAME = ucfirst(substr($row['MIDDLENAME'],0,1));
    $SURNAME= strtoupper($row['SURNAME']);
?>