<?php

	require 'Core.php';
	require 'Connect.php';
	
	if(loggedin()){
		if(isset($_POST['ID'])&&isset($_POST['Requested_by'])&&isset($_POST['Date'])&&isset($_POST['Urgency'])&&isset($_POST['ServiceType'])&&isset($_POST['ServiceType'])&&isset($_POST['Problem'])){
			$ID = $_POST['ID'];
			$Requested_by = $_POST['Requested_by'];
			$Date = $_POST['Date'];
			$Urgency = $_POST['Urgency'];
			$ServiceType = $_POST['ServiceType'];
			$Problem = $_POST['Problem'];

			if(!empty($ID)&&!empty($Requested_by)&&!empty($Date)&&!empty($Urgency)&&($ServiceType!='--Select Option--')&&!empty($Problem)){
				$query = "INSERT INTO `servicerequests`(`Requested_by`, `Urgency`, `ServiceType`, `Problem`, `Status`,`SubmittedDate`) VALUES ('".$Requested_by."','".$Urgency."','".$ServiceType."','".mysql_real_escape_string($Problem)."','Awaiting','".$Date."')";
				if($query_run = mysql_query($query)){
					echo "<script>alert('Form submitted');</script>";
				}
				else{
					echo "<script>alert('Could not submit request');</script>";
				}
			}
			else{
				echo "<script>alert('Please fill in required fields');</script>";
			}
		}

?>

		<form action="ServiceRequest.php" method="POST">
			<input type="hidden" name="ID" value="<?php echo $_SESSION['user_id']; ?>" readonly>
			Requested_by:<br><input type="text" name="Requested_by" value="<?php echo getuserfield('Username'); ?>" readonly><br><br>
			Date:<br><input type="text" name="Date" value="<?php echo date('d-m-Y g:i A', time()+10800); ?>" readonly><br><br>
			Urgency:<br><input type="radio" name="Urgency" value="Low">Low</input>
						<input type="radio" name="Urgency" value="Medium" checked=true>Medium</input>
						<input type="radio" name="Urgency" value="High" >High</input><br><br>
			Service Type:<br>

<?php

			$query = "SELECT `ServiceType` FROM `servicetypes` ORDER BY `ServiceType`";
			echo select($query, 'ServiceType');

?>

			Problem:<br><textarea name="Problem" rows="5" cols="50" maxlength="255"></textarea><br><br>
			<input type="submit" name="Send" value="Send">	
		</form>
		<a href="Main.php">Back to Main</a><br>
<?php

	}
	else{
		echo "<script>alert('Please log in!'); location.href = 'Index.php'; </script>";
	}

?>
