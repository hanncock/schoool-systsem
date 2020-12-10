<?php
	require_once('connector.php');
if(isset($_POST['save'])){	
		$id = $_POST['save'];
		$admno =$_POST['admno'];
		$fname = $_POST['fname'];
		$tname = $_POST['tname'];
		$sirname = $_POST['sirname'];
		$oname = $_POST['oname'];
		$dob =$_POST['dob'];
		$gender =$_POST['gender'];
		$class =$_POST['class'];
		$stream = $_POST['stream'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$county = $_POST['county'];
		$status = $_POST['status'];

		$sql4 = "UPDATE student SET admno='$admno',fname='$fname',sirname='$sirname',tname='$tname',othername='$oname'
			,dob='$dob',gender='$gender',phone='$phone',class='$class',stream='$stream',email='$email',status='$status' WHERE id=$id";

		echo $sql;
		if($conn->query($sql4) === TRUE){
			echo "Student edited sucesfully"."<br>" ;
			header("Location:../php/editstudent.php?popup");
		}else{
			echo "Error:";
		}	
	}else{
		//echo "<span style='color:red'>enter missing school edit details</span>";
		
	}
	
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql2 =  "DELETE FROM student WHERE id=$id";
		$result = $conn->query($sql2);
		if($conn->query($sql2) === TRUE){
			echo "Student edited sucesfully"."<br>" ;
			header("Location:../php/edituselesstudent.php?del");
		}
		
	}
	?>