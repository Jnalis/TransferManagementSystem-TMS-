<?php
	session_start();
	session_unset($_SESSION['user']);
	$url = "index.php";
	if(isset($_GET["session_expired"])) {
		$url .= "?session_expired=" . $_GET["session_expired"];
	}
	header("Location:$url");
?>
