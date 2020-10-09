<?php
 require_once('connector.php');

 if(isset($_POST['savexam'])){
	$examname =$_POST['examname'];
	$examcode = $_POST['examcode'];
		
	$sql = "insert into exam(name,code)values('$examname','$examcode')";
	if($conn->query($sql) === TRUE){
		echo "exam created";
	}else{
		echo "not created";
	}
	
 }
 
 $sql ="select * from exam ";
 $result = $conn->query($sql);
 if($result->num_rows>0){
	 while($row=$result->fetch_assoc()){
		 echo $row['name'];
	 }
 }
 
 
?>