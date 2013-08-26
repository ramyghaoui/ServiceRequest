<?php

	ob_start();
	session_start();
	$current_file = $_SERVER['SCRIPT_NAME'];

	//if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
		//$http_referer = $_SERVER['HTTP_REFERER'];
	//}

	function loggedin(){
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
			return true;
		}
		else{
			return false;
		}
	}

	function getuserfield($field){
		$query = "SELECT `".$field."` FROM `users` WHERE `ID`='".$_SESSION['user_id']."'";
		if($query_run = mysql_query($query)){
			if($query_result = mysql_result($query_run, 0, $field)){
				return $query_result;
			}
		}
	}
	
	function getfield($field1, $table, $field2, $condition){
		$query = "SELECT `".$field1."` FROM `".$table."` WHERE `".$field2."`='".$condition."'";
		if($query_run = mysql_query($query)){
			if($query_result = mysql_result($query_run, 0, $field1)){
				return $query_result;
			}
		}
	}

	function fetchreport($query){
		$query_run = mysql_query($query);
		echo '<table border="1" CELLPADDING="5"><tr>';
		FOR ($i=0; $i<mysql_num_fields($query_run); $i++){
			echo '<th>'.mysql_field_name($query_run, $i).'</th>';
		}
		echo '</tr>';
		while ($row = mysql_fetch_assoc($query_run, MYSQL_NUM)) {
			echo '<tr>';
			FOR ($i=0; $i<mysql_num_fields($query_run); $i++){
				echo '<td>'.$row[$i].'</td>'; 
			}
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function select($query, $value){
		$query_run = mysql_query($query);
		while ($query_num_row = mysql_fetch_array($query_run)){
			echo '<option value="'.$query_num_row[$value].'">'.$query_num_row[$value].'</option>';
		}
	}

?>