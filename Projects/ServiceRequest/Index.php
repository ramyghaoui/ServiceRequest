<?php

	require 'Core.php';
	require 'Connect.php';

	if (loggedin()){
		$firstname = getuserfield('FirstName');
		$lastname = getuserfield('LastName');
		$user_id = $_SESSION['user_id'];
		echo 'Welcome '.$firstname.' '.$lastname.'! <a href="logout.php">Log out</a><br><a href="ServiceRequest.php">ServiceRequest</a><br>';
		
	}
	else{
		include 'LogInForm.php';
	}

?>