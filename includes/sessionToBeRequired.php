<?php
session_start();
require_once("../functions/sessionFunction.php");
if (isset($_SESSION["user_id"])) {
    if (isLoginSessionExpired()) {
        header("Location:../logout.php?session_expired=1");
    }
}
$user_id = $_SESSION['user_id'];

$fname = ucfirst($_SESSION['fname']);
$mname = strtoupper(substr($_SESSION['mname'], 0, 1));
$sname = strtoupper($_SESSION['sname']);
