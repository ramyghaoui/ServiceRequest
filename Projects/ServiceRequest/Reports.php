<?php

	require 'Core.php';
	require 'Connect.php';
	
	if(loggedin()){

		echo 'Hello '.getuserfield('FirstName').' '.getuserfield('LastName').'! <a href="Main.php">Back to Main</a><br>';	
		$department = 'Department';
		$table = 'users';
		$field = 'Username';
		$condition = getuserfield('Username');

		if(getfield($department, $table, $field, $condition)){
			$query = "SELECT `ID`, `Requested_by`, `Urgency`, `ServiceType`, `Problem`, `Status`, `Solution`, `ReceivedDate`, `TimeCost` FROM `servicerequests` WHERE 1";
			fetchreport($query);
		}
		else{
			$query = "SELECT `ID`, `Urgency`, `ServiceType`, `Problem`, `Status`, `Solution`, `ReceivedDate`, `TimeCost` FROM `servicerequests` WHERE `Requested_by`='ramy'";
			fetchreport($query);
		}

	
?>

		<form action="ServiceRequest.php" method="POST">
			
		</form>
		

<?php
	
	}
	else{
		echo "<script>alert('Please log in!'); location.href = 'Index.php'; </script>";
	}
	
?>