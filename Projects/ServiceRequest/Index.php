<?php

	require 'Core.php';
	require 'Connect.php';

?>

	<!DOCTYPE html>
	<html>
		<head>
			<title>LogIn Form</title>
			<link rel="stylesheet" type="text/css" href="styling.css"/>
		</head>
			<body class="bg">
				<h1>Welcome to Service Request Web Application</h1>
				<h2>Service Request home.</h2>
			</body>
	</html>

<?php

	if (loggedin()){
		$firstname = getuserfield('FirstName');
		$lastname = getuserfield('LastName');
		echo 'Welcome '.$firstname.' '.$lastname.'! <a href="logout.php">Log out</a><br><a href="Main.php">Go to Main</a>';
		
	}
	else{
		include 'LogInForm.php';
	}

?>
