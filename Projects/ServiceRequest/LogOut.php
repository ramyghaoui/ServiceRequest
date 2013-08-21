<?php

	require 'Core.php';
	session_destroy();
	header('Location: '.$http_referer);

?>