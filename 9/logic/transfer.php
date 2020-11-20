<?php 
	require('connector.php');
	if(isset(($_POST))){
		//$admno = count($_POST['admno']);
		$classfrom =$_POST['classfrom'];
		$classto =$_POST['classto'];
		$sql = "update student set class='$classto' where class='$classfrom' ";
		echo $sql;
//	echo $admno;
		/*$sql = "insert into `results`(`examname`,`class`,`stream`,`names`,`admno`,`math`,`eng`,`kisw`,`chem`,`phy`,`bio`)values";
		for($i=0; $i<$admno; $i++){
			$sql .="('".$_POST["examname"][$i]."','".$_POST["class"][$i]."','".$_POST["stream"][$i]."','".$_POST["names"][$i]."','".$_POST["admno"][$i]."','".$_POST["math"][$i]."','".$_POST["eng"][$i]."','".$_POST["kisw"][$i]."','".$_POST["chem"][$i]."','".$_POST["phy"][$i]."','".$_POST["bio"][$i]."'),";
		}
		$noarray = array();
		for ( $i = 0; $i <=$admno; $i++ ){
			$noarray[] = ($_POST["classto"][$i]);
			//$noarray[0] = $_POST["classto"][$i];
			//$noarray[1] = $_POST["classto"][$i];
			$soke=array($_POST["classto"][$i]);
		}
		print_r($soke);*/
	/*	$cls=array(for($i=0; $i<$admno; $i++){$_POST["classto"][$i]});
		print_r($cls);
		$sql = "UPDATE `results` SET class="/*.for($i=0; $i<$admno; $i++){$_POST["classto"][$i];}.*///"where admno=1072";
	//echo $sql;
		//$finalQuery = rtrim($sql,',');
//	mysqli_query($conn,$finalQuery);
		if($conn->query($sql) === TRUE){
			echo "exams resgitered";
			header("Location:../php/transfer.php?popup");
		}else{
			echo"not exams entered";
		}
	}
?>
