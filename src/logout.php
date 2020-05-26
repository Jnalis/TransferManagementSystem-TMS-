<?php
	session_start();
	session_unset($_SESSION['user']);
	$url = "../index.php";
	if(isset($_GET["session_expired"])) {
		if (isset($_COOKIE["email"]) AND isset($_COOKIE["password"])){
			setcookie("email", '', time() - (3600));
			setcookie("password", '', time() - (3600));
		}
		$url .= "?session_expired=" . $_GET["session_expired"];
	}
	header("Location:$url");
?>
