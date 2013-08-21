<?php

	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_pass = '';
	$mysql_db = 'servicerequests';
	$error_msg = 'Could not connect to Server and/or DataBase';
	if (!@mysql_connect($mysql_host, $mysql_user, $mysql_pass)||(!mysql_select_db($mysql_db))){
		die($error_msg);
	}

?>