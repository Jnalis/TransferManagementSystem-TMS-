<?php
session_start();
require_once('session.php');
$message = "";

if (isset($_POST['login'])) {
    if ($_POST['email'] != "" || $_POST['password'] != "") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `user_info` WHERE `email`=? ";
        $query = $conn->prepare($sql);
        $query->execute(array($email));
        $row = $query->rowCount();
        $fetch = $query->fetch();

        if ($row > 0 && password_verify($password,$fetch['password'])) {
            $opt = $fetch['role'];
            switch ($opt) {
                case 'Head of institution':
                    if (isset($_POST['remember_me'])) {
                        setcookie("email", $fetch['email'], time() + (86400 * 30)); 
				        setcookie("password", $password, time() + (86400 * 30)); 
                    }
                    $_SESSION['user'] = $fetch['user_id'];
                    $_SESSION['fname'] = $fetch['firstname'];
                    $_SESSION['mname'] = $fetch['middlename'];
                    $_SESSION['sname'] = $fetch['surname'];
                    $_SESSION['loggedin_time'] = time();

                    if (isset($_SESSION["user"])) {
                        if (!isLoginSessionExpired()) {
                            echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
                        } else {
                            header("Location:logout.php?session_expired=1");
                        }
                    }
                    if (isset($_GET["session_expired"])) {
                        $message = "Session is Expired. Please Login Again.";
                    }
                    break;

                case 'workers':
                    if (isset($_POST['remember_me'])) {
                        setcookie("email", $fetch['email'], time() + (86400 * 30)); 
				        setcookie("password", $password, time() + (86400 * 30)); 
                    }
                    $_SESSION['user'] = $fetch['user_id'];
                    $_SESSION['fname'] = $fetch['firstname'];
                    $_SESSION['mname'] = $fetch['middlename'];
                    $_SESSION['sname'] = $fetch['surname'];
                    $_SESSION['loggedin_time'] = time();

                    if (isset($_SESSION["user"])) {
                        if (!isLoginSessionExpired()) {
                            echo "<script type='text/javascript'> document.location = 'user/index.php'; </script>";
                        } else {
                            header("Location:logout.php?session_expired=1");
                        }
                    }
                    if (isset($_GET["session_expired"])) {
                        $message = "Session is Expired. Please Login Again.";
                    }
                    break;

                default:
                    echo 'not anyone';
                    //echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                    break;
            }
        } else {
            $message = "Invalid email or password!";
        }
    } else {
        $message = "Please complete the required field!";
    }
}
