<?php
	require('connector.php');
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: Login.php");
		exit;
	}
?>