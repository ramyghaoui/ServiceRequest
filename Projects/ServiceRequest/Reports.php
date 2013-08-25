<?php

	require 'Core.php';
	require 'Connect.php';
	
	if(loggedin()){
		echo 'Hello '.getuserfield('FirstName').' '.getuserfield('LastName').'! <a href="Main.php">Back to Main</a><br>';	

?>

			<html>
				<head>
					<title>Reports</title>
				</head>
				<body>
					<div class="Reports">
						<div class="Head">
							<form action="Reports.php" method="POST">
								<input type="radio" name="Status" value="Awaiting" checked=true>Awaiting</input>
								<input type="radio" name="Status" value="In Progress">In Progress</input>
								<input type="radio" name="Status" value="Solved">Solved</input>
								<input type="radio" name="Status" value="All">All</input>
								<input type="submit" name="Fetch" value="Fetch" onclick=fetchreport()>
							</form>
						</div>
						<div class="Body">
						
						</div>
					</div>
				</body>
			</html>

<?php

		if(isset($_POST['Status'])){
			$department = 'Department';
			$table = 'users';
			$field = 'Username';
			$condition_username = getuserfield('Username');
			$status = $_POST['Status'];
			
			if(getfield($department, $table, $field, $condition_username)=='IT'){
				if($status == 'All'){
					$query = "SELECT `ID`, `Requested_by`, `Urgency`, `ServiceType`, `Problem`, `Status`, `Solution`, `SubmittedDate`, `TimeCost` FROM `servicerequests` WHERE 1";
					fetchreport($query);
				}
				else{
					$query = "SELECT `ID`, `Requested_by`, `Urgency`, `ServiceType`, `Problem`, `Status`, `Solution`, `SubmittedDate`, `TimeCost` FROM `servicerequests` WHERE `Status`='".mysql_real_escape_string($status)."'";
					fetchreport($query);				
				}
			}
			else{
				if($status == 'All'){
					$query = "SELECT `ID`, `Urgency`, `ServiceType`, `Problem`, `Status`, `Solution`, `SubmittedDate` FROM `servicerequests` WHERE `Requested_by`='".mysql_real_escape_string($condition_username)."'";
					fetchreport($query);
				}
				else{
					$query = "SELECT `ID`, `Urgency`, `ServiceType`, `Problem`, `Status`, `Solution`, `SubmittedDate` FROM `servicerequests` WHERE `Requested_by`='".mysql_real_escape_string($condition_username)."' AND `Status`='".$status."'";
					fetchreport($query);
				}
			}
		}
	}
	else{
		echo "<script>alert('Please log in!'); location.href = 'Index.php'; </script>";
	}

?>