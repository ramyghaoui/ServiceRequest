<?php

	require 'Core.php';
	require 'Connect.php';

	if(loggedin()){
		$department = 'Department';
		$table = 'users';
		$field = 'Username';
		$condition = getuserfield('Username');
		if(getfield($department, $table, $field, $condition)){
			echo'OK!';
		}
		else{
			echo "<script>alert('This section is only available for IT Personnel');</script>";
		}
	
?>
	
		<form action="Solution.php" method="POST">
			Requested_by:<br><input type="text" name="Requested_by" value="Requested_by" readonly><br><br>
			Date:<br><input type="text" name="Date" value="Date" readonly><br><br>
			Urgency:<br><input type="text" name="Urgency" value="Urgency" readonly><br><br>
			Requested_by:<br><input type="text" name="ServiceType" value="ServiceType" readonly><br><br>
			Problem:<br><textarea name="Problem" rows="5" cols="50" maxlength="255" readonly></textarea><br><br>
			Action Taken:<br><textarea name="ActionTaken" rows="5" cols="50" maxlength="255"></textarea><br><br>
			<input type="submit" name="Send" value="Send">	
		</form>
		<a href="Home.php">Home</a><br>

<?php

	}
	else{
		echo 'Please <a href="Index.php">log in!</a>';
	}

?>