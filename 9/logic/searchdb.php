<?php
	require('../logic/connector.php');
	
	if(isset($_GET['package'])){
		$fname = $_GET['package'];
		$sql = "select * from fees where package LIKE '$fname%'";
		$res = $conn->query($sql);
		if($res->num_rows>0){
			while($row=$res->fetch_assoc()){
				echo $row['amnt'];
			}
		}
	}
	
	if(isset($_GET['bookname'])){
		$book = $_GET['bookname'];
		$sql = "select * from library where bookname LIKE '$book%'";
		$res = $conn->query($sql);
		if($res->num_rows>0){
			while($row=$res->fetch_assoc()){
				echo $row['copies'];
			}
		}
	}
	
	if(isset($_GET['admno'])){
		$book = $_GET['admno'];
		$sql = "select * from student where admno ='$book%'";
		$res = $conn->query($sql);
		if($res->num_rows>0){
			while($row=$res->fetch_assoc()){
				echo $row['fname'].$row['sirname'].$row['tname'].$row['othername'];
			}
		}
	}
	
?>