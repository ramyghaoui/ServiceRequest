<?php

	if (isset($_POST['username'])&&isset($_POST['password'])){
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_hash = md5($password);
		
		if(!empty ($username)&&!empty($password)){

			$query = "SELECT `ID` FROM `users` WHERE `Username`='".mysql_real_escape_string($username)."' AND `Password`='".mysql_real_escape_string($password_hash)."'";
			
			if($query_run = mysql_query($query)){
				$query_num_rows = mysql_num_rows($query_run);
				
				if($query_num_rows==0){
					echo "<script>alert('Invalid username/password combination!');</script>";
				}
				else if($query_num_rows==1){
					$user_id = mysql_result($query_run, 0, 'ID');
					$_SESSION['user_id']=$user_id;
					header('Location: Index.php');
				}
			}
		}
		else{
			echo "<script>alert('Please provide both, Username and Password');</script>";
		}
	}

?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>LogIn Form</title>
			<link rel="stylesheet" type="text/css" href="styling.css"/>
		</head>
			<body>
				<form action="<?php echo $current_file; ?>" method="POST">
					Username: <input class="inputfield" type="text" name="username"> Password: <input class="inputfield" type="password" name="password">
					<input type="submit" name="Log in"><br>
					New user? <a href="Register.php">Register now!</a>
				</form>
			</body>
	</html> 
