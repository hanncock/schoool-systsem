<?php
require_once('connector.php');
//if(isset($_POST['schlname'])){
if(isset($_POST['schlname'])){	
	$schlname = $_POST['schlname'];
	$schladdress = $_POST['schladdress'];
	$schlvat=$_POST['schlvat'];
	$schlhealth=$_POST['schlhealth'];
	$schllocation=$_POST['schllocation'];
	$schlpin=$_POST['schlpin'];
	$schlphone=$_POST['schlphone'];
	$schllogo = $_POST['schlogo'];
	$schlwebsite = $_POST['schlwebsite'];
	$schlemail = $_POST['schlemail'];

$sql = "insert into schl(schlname,schladdress,schlvat,schlhealth,schllocation,schlpin,schlphone,logo,website,email)
						VALUES
		('$schlname','$schladdress','$schlvat','$schlhealth','$schllocation','$schlpin','$schlphone','$schlogo','$schlwebsite','$schlemail')";

	
if($conn->query($sql) === TRUE){
			
			echo "school sucesfully created"."<br>" ;
		}else{
			echo "Error:";
		}	
}else{
		echo "enter missing school deails";
		//header("Location:../ui/addschool.php");
}	
?>