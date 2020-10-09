<?php
require_once('connector.php');
if (isset($_GET['delete'])){
	$id = $_GET['delete'];
		
	$sql= "DELETE from schl where id='$id'";

if($conn->query($sql) === TRUE){
			
			echo "school deleted sucesfully "."<br>" ;
		}else{
			echo "Error:";
		}	
}else{
		echo "del no clicked";	
}

?>