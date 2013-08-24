<?php

	require 'Core.php';
	require 'Connect.php';
	
	if(!loggedin()){
		if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['re_password'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])){
		
			$username = $_POST['username'];
			$password = $_POST['password'];
			$re_password = $_POST['re_password'];
			$password_hash = md5($password);
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$department = $_POST['Department'];
			$title = $_POST['Title'];
			
			if(!empty($username)&&!empty($password)&&!empty($re_password)&&!empty($firstname)&&!empty($lastname)&&!empty($email)){
				if($password != $re_password){
					echo "<script>alert('Passwords do not match!');</script>";
				}
				else{
					$query = "SELECT `Username` FROM `users` WHERE `Username`='$username'";
					$query_run = mysql_query($query);
					if(mysql_num_rows($query_run)==1){
						echo "<script>alert('Username ".$username." already exists!');</script>";
					}
					else{
						$query = "INSERT INTO `users` VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($department)."','".mysql_real_escape_string($title)."')";
						if($query_run = mysql_query($query)){
							header('Location: RegistrationSuccess.php');
						}
						else{
							echo "<script>alert('Unable to register, please try again later');</script>";
						}
						echo 'Department is '.$department;
						echo 'Title is '.$title;
					}
				}
			}
			else{
				echo "<script>alert('All fields are required!');</script>";
			}
		}

?>

		<form action="Register.php" method="POST">
			Username:<br><input type="text" name="username" maxlength="20" value="<?php if(isset($username)){ echo $username; } ?>"><br><br>
			Password:<br><input type="password" name="password"><br><br>
			Re-enter password:<br><input type="password" name="re_password"><br><br>
			First Name:<br><input type="text" name="firstname" maxlength="20" value="<?php if(isset($firstname)){ echo $firstname; } ?>"><br><br>
			Last Name:<br><input type="text" name="lastname" maxlength="20" value="<?php if(isset($lastname)){ echo $lastname; } ?>"><br><br>
			E-mail:<br><input type="text" name="email" maxlength="20" value="<?php if(isset($email)){ echo $email; } ?>"><br><br>
			Department:<br>

<?php

		$query = "SELECT `Department` FROM `departments` ORDER BY `Department`";
		$query_run = mysql_query($query);
		echo '<select name="Department">';
		while ($query_num_row = mysql_fetch_array($query_run)) {
		   echo '<option value="'.$query_num_row['Department'].'">'.$query_num_row['Department'].'</option>';
		}
		echo '</select><br><br>Title:<br>';

		$query = "SELECT `Title` FROM `titles` ORDER BY `Title`";
		$query_run = mysql_query($query);
		echo '<select name="Title">';
		while ($query_num_row = mysql_fetch_array($query_run)) {
		   echo '<option value="'.$query_num_row['Title'].'">'.$query_num_row['Title'].'</option>';
		}
		echo '</select><br><br>';

?>

			<input type="submit" name="Register" value="Register">
		</form>
		<a href="Index.php">Home</a><br>

<?php

	}
	else if(loggedin()){
		echo "<script>alert('You are already registered and logged in');  location.href = 'Index.php'; </script>";
	}

?>