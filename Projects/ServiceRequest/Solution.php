<?php

	require 'Core.php';
	require 'Connect.php';

	if(loggedin()){
	
		$department = 'Department';
		$table = 'users';
		$field_username = 'Username';
		$condition = getuserfield('Username');
		
		if(getfield($department, $table, $field_username, $condition)=='IT'){
			
		}
		else{
			echo "<script>alert('This section is only available for IT Personnel'); location.href = 'Main.php'; </script>";
		}
	
?>
	
		<form action="Solution.php" method="POST">
			ID:<br><input type="text" name="ID" value="<?php echo $_SESSION['user_id']; ?>" readonly><br><br>
			Requested by:<br><input type="text" name="Requested_by" value="<?php getuserfield($field_username); ?>" readonly><br><br>
			Urgency:<br><input type="text" name="Urgency" value="Urgency" readonly><br><br>
			Service Type:<br><input type="text" name="ServiceType" value="ServiceType" readonly><br><br>			
			Submitted Date:<br><input type="text" name="Date" value="Date" readonly><br><br>
			Status:<br><input type="text" name="Status" value="Status" readonly><br><br>
			Problem:<br><textarea name="Problem" rows="5" cols="50" maxlength="255" readonly></textarea><br><br>
			Action Taken:<br><textarea name="ActionTaken" rows="5" cols="50" maxlength="255"></textarea><br><br>
			<input type="button" name="In Progress" value="In Progress" onclick="In Progress()"/><input type="submit" name="Solved" value="Solved" onclick="Solved()"/><input type="button" name="Next" value="Next" onclick="Next()"/>
		</form>
		<a href="Main.php">Back to Main</a><br>

<?php

	}
	else{
		echo "<script>alert('Please log in!'); location.href = 'Index.php'; </script>";
	}

?>