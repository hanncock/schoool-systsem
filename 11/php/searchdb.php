<?php
	$host = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "words";
	$conn = new mysqli($host, $username, $password, $dbname);
	
	if(isset($_GET['word'])){
		$word = $_GET['word'];
		$wo = explode(" ",$word);
		//print_r($wo);
		foreach($wo as $txt){
			$sql = "select * from words where keyrep LIKE '$txt'";
			//echo $sql;
			$res = $conn->query($sql);
		if($res->num_rows>0){
			while($row=$res->fetch_assoc()){
				echo $row['correspondent']." ";
			}
		}
		}
		//$sql = "select * from words where keyrep LIKE '$word%'";
		/*echo $sql;
		$res = $conn->query($sql);
		if($res->num_rows>0){
			while($row=$res->fetch_assoc()){
				echo $row['correspondent'];
			}
		}*/
	}
?>