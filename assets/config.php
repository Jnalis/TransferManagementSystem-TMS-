<?php

@$con = mysqli_connect('localhost','root','');
 
if (!$con) {
	die('ERROR: Could not connec to the server.');
} else {
	$select_db = mysqli_select_db($con,'TTMS');

	if(!$select_db){
		die('ERROR: Could not select DB.');
	}
}



?>