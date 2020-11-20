<?php
	require('connector.php');
	if(isset($_POST['transfer'])){
		
		$admno = $_POST['admno'];
		$classto = $_POST['classto'];
		$streamto = $_POST['streamto'];
								
		$sql = "update student set class='$classto', stream='$streamto' where admno='$admno'";

		if($conn->query($sql)===TRUE){
		//	echo 'changed succesful';
			header("Location:../php/transferstudent.php?popup");
		}else{
			echo 'not changed';
		}
	}
?>