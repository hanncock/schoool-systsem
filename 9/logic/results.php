<?php 
	require('connector.php');
	($_POST);
		
       	$admno = count($_POST['admno']);
//	echo $admno;
	$sql = "insert into `results`(`examname`,`class`,`stream`,`names`,`admno`,`math`,`eng`,`kisw`,`chem`,`phy`,`bio`,`year`)values";
	for($i=0; $i<$admno; $i++){
		$sql .="('".$_POST["examname"][$i]."','".$_POST["class"][$i]."','".$_POST["stream"][$i]."','".$_POST["names"][$i]."','".$_POST["admno"][$i]."','".$_POST["math"][$i]."','".$_POST["eng"][$i]."','".$_POST["kisw"][$i]."','".$_POST["chem"][$i]."','".$_POST["phy"][$i]."','".$_POST["bio"][$i]."','".$_POST["year"][$i]."'),";
	}
	echo $sql;
	$finalQuery = rtrim($sql,',');
//	mysqli_query($conn,$finalQuery);
	if($conn->query($finalQuery) === TRUE){
			echo "exams resgitered";
			header("Location:../php/addresults.php");
	}else{
		echo"not exams entered";
	}
?>
