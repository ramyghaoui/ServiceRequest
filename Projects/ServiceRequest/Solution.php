<?php

	require 'Core.php';
	require 'Connect.php';

	if(loggedin()){

		$department = 'Department';
		$table = 'users';
		$field_username = 'Username';
		$condition = getuserfield('Username');
		
		if(getfield($department, $table, $field_username, $condition)=='IT'){
			if(isset($_POST['ID'])&&isset($_POST['Date'])&&isset($_POST['Problem'])&&isset($_POST['Solution'])){
				$ID = $_POST['ID'];
				$Date = $_POST['Date'];
				$Problem = $_POST['Problem'];
				$Solution = $_POST['Solution'];
				$TimeCost = timecost($Date);

				$query = "UPDATE `servicerequests` SET `Status`='Solved',`Solution`='".$Solution."',`TimeCost`='".$TimeCost."' WHERE `ID`='".$ID."'";
				if($query_run = mysql_query($query)){
					echo "<script>alert('Solved!'); </script>";
				}
			}
		}
		else{
			echo "<script>alert('This section is only available for IT Personnel'); location.href = 'Main.php'; </script>";
		}

?>
	
		<form action="Solution.php" method="POST">
			ID:<br><input type="text" name="ID" value="<?php echo solution('ID'); ?>" readonly><br>
			Requested by:<br><input type="text" name="Requested_by" value="<?php echo solution('Requested_by'); ?>" readonly><br>
			Urgency:<br><input type="text" name="Urgency" value="<?php echo solution('Urgency'); ?>" readonly><br>
			Status:<br><input type="text" name="Status" value="<?php echo solution('Status'); ?>" readonly><br>
			Service Type:<br><input type="text" name="ServiceType" value="<?php echo solution('ServiceType'); ?>" readonly><br>
			Submitted Date:<br><input type="text" name="Date" value="<?php echo solution('SubmittedDate'); ?>" readonly><br>
			Problem:<br><textarea name="Problem" rows="5" cols="50" maxlength="255" readonly><?php echo solution('Problem'); ?></textarea><br>
			Action Taken:<br><textarea name="Solution" rows="5" cols="50" maxlength="255"><?php echo solution('Solution'); ?></textarea><br><br>
			<input type="submit" name="solved" value="Solved"/>
		</form>
		<a href="Reports.php">Back to Reports</a><br><br>
		<a href="Main.php">Back to Main</a><br>

<?php

	}
	else{
		echo "<script>alert('Please log in!'); location.href = 'Index.php'; </script>";
	}

?>
