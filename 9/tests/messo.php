<!DOCTYPE html>
<?php
if(isset($_POST['submit'])){
			$msg = $_POST['msg'];
			if(empty($msg)){
				$msg = "no message";
				echo $msg;
			}else{
				echo $msg;
			}
		}

?>
<html>
	<head>
	</head>
	<body>
	<form method="POST">
		enter message
		<input type="msg" name="msg">
		<input type="submit" name="submit">
		<?php
		if(empty($msg)){
			?>
		<span style="background:green;"><?php echo $msg;?></span>
		<?php }
		
		function  meso($sender,$receiver){
			$sql = "SELECT * from message where sender='$sender' AND receiver='$receiver' OR sender='$receiver' AND receiver='$sender'";
			echo $sql;
		}
	$username = 'soke';
	$recepient = 'hanno';
	meso($username, $recepient);
		?>
		
		</form>
	</body>
</html>
<html>
	<head>
		<title>Sending SMS</title>
	</head>

	<body>
			<h3>Sending SMS</h3>
			<form method='GET' action='sendSMS.php'>
				Phone <input type='phone' name = 'phone' autocomplete='off'> <br>
				Message <input type='message' name='message'><br>
				<input type='submit' value='Send'/>
			 </form>
	</body>
</html>

<!--?php
try{
	$message = isset($_GET['message']) ? $_GET['message'] : null;
	$phoneNumber = isset($_GET['phone']) ? $_GET['phone'] : null;

	if($message !=null && $phoneNumber !=null){
		$url = "http://192.168.1.101:8090/SendSMS?username=Sadiq&password=1234&phone=".$phoneNumber."&message=".urlencode($message);
		$curl = curl_init($url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);

		if($curl_response === false){
			$info = curl_getinfo($curl);
			curl_close($curl);
			die('Error occurred'.var_export($info));
		}

		curl_close($curl);

		$response  = json_decode($curl_response);
		if($response->status == 200){
			echo 'Message has been sent';
		}else{
			'Technical Problem';
		}

	}
}catch(Exception $ex){
	echo "Exception: ".$ex;
}
?-->
<!--?php
	$servername = 'localhost';
	$username = 'root';
	$password = '1234';
	$dbname = 'test';

	$message = isset($_GET['message']) ? $_GET['message'] : null;
	$phoneNumber = isset($_GET['phoneNumber']) ? $_GET['phoneNumber'] : null ;

		$conn = new mysqli($servername, $username, $password, $dbname);

		if($conn->connect_error){
			die('Connection failed'.$conn->connect_error);
		}

		if($message){
			$sql = "INSERT INTO inbox (phone_number, message) 
			Values ('".$phoneNumber."', '".$message."')";

			if($conn->query($sql) === TRUE){
				echo "New record created successfully";
			}else{
				echo "Error: ".$sql. "<br> ".$conn->error;
			}
		}else{
			$sql = "SELECT * FROM inbox";
			$result = $conn->query($sql);

			if($result){
				echo "<table border=1> <th>ID</th> <th>PHONE</th> <th>MESSAGE</th>";
				foreach($result as $row){
					echo "<tr><td>".$row['id']."</td><td>".$row['phone_number']."</td><td>".$row['message']."</td></tr>";
				}
				echo "</table>";
			}else{
				echo "Error: ".$sql. "<br>".$conn->error;
			}

		}

		$conn->close();
?-->
