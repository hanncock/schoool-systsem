<?php
	require('../logic/connector.php');
	$fname = $_GET['fname'];
	$sql = "select * from student where fname='$fname'";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			echo $row['id'];
			echo $row['fname'];
		}
	}
?>