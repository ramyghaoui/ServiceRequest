<?php

	require 'Core.php';
	require 'Connect.php';

	if(loggedin()){
	
		$department = 'Department';
		$table = 'users';
		$field = 'Username';
		$condition = getuserfield('Username');
		
		if(getfield($department, $table, $field, $condition)){
			echo 'Okayyy';
		}
		else{
			echo "<script>alert('This section is only available for IT Personnel'); location.href = 'Main.php'; </script>";
		}
	
?>
	
		<form action="Solution.php" method="POST">
			<input type="test" name="ID" value="ID" readonly><br>
			Requested_by:<br><input type="text" name="Requested_by" value="<?php getfield('Username', 'users', $field, $condition); ?>" readonly><br><br>
			Date:<br><input type="text" name="Date" value="Date" readonly><br><br>
			Urgency:<br><input type="text" name="Urgency" value="Urgency" readonly><br><br>
			Requested_by:<br><input type="text" name="ServiceType" value="ServiceType" readonly><br><br>
			Problem:<br><textarea name="Problem" rows="5" cols="50" maxlength="255" readonly></textarea><br><br>
			Action Taken:<br><textarea name="ActionTaken" rows="5" cols="50" maxlength="255"></textarea><br><br>
			<input type="submit" name="Solved" value="Solved"/><input type="button" name="Pending" value="Pending" onclick="Pending()"/><input type="button" name="Next" value="Next" onclick="Next()"/>
		</form>
		<a href="Main.php">Back to Main</a><br>

<?php

	}
	else{
		echo "<script>alert('Please log in!'); location.href = 'Index.php'; </script>";
	}

?>