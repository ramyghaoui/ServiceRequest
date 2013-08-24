<?php

	require 'Core.php';
	session_destroy();
	header('Location: Index.php');
	/*if (isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
		header('Location: '.$http_referer)
	}
	else{
		header('Location: Index.php');
	}*/

?>