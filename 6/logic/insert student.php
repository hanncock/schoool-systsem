<?php
require_once('connector.php');
//if(isset($_POST['schlname'])){
if(isset($_POST['admno'])){	
	$admno =$_POST['admno'];
	$fname = $_POST['fname'];
	$sirname = $_POST['sirname'];
	$oname = $_POST['oname'];
	$dob =$_POST['dob'];
	$gender =$_POST['gender'];
	$class =$_POST['class'];
	$stream = $_POST['stream'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

$sql = "insert into student(admno,fname,sirname,othername,dob,gender,class,stream,email,phone)
						VALUES
		('$admno','$fname','$sirname','$oname','$dob','$gender','$class','$stream','$email','$phone')";

	
if($conn->query($sql) === TRUE){
			
			echo "student added "."<br>" ;
			//header("Location:../ui/addschool.php");
		}else{
			echo "Error:";
		}	
}else{
		echo "enter missing student details";
		//header("Location:../ui/addschool.php");
}	
?>