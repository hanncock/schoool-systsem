<?php
require_once('connector.php');
require_once('../php/session.php');


	$sql1 = "SELECT * from fees";
	$result=$conn->query($sql1);
	if ($result->num_rows > 0) {	
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$GLOBALS['fees'] = $row['amnt'];
		}
	}else{
		
	}


?>
