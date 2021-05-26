<?php
	$host = "127.0.0.1";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "farmvet";

	$conn =new mysqli($host,$dbusername,$dbpassword,$dbname);
	
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: Login.php");
		exit;
	}

	//$_SESSION['loginTime'] = time();
	//if($_SESSION['loginTime'] < time()+20*60){ logout(); }
?>