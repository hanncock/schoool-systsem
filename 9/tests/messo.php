<html>
	<head>
	
	</head>
	<body>

<?php
require_once("../logic/connector.php");
require_once('../php/session.php');

$user = $_SESSION["username"];
$sql1 = "select * from student";
$res = $conn->query($sql1);
if($res->num_rows>0){
	echo "<table>";
	while($row=$res->fetch_assoc()){
		 echo "<tr>";
		 echo "<td>" . $row['id'] . "</td>";
		 echo "<td>" . $row['fname'].$row['sirname'].$row['tname'].$row['othername'] . "</td>";
		 ?>
		  <td>
			<button>
				<a href="messo.php?edit=<?php echo $row['id']?>">Compose</a>
			</button>
			<!--button style="background:green;"
				<a href="messo.php?edit=<!--?php echo $row['id'] ?>" >Compose</a>
			</button-->
		</td></tr>
		<?php
	}
}
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$sql3="select * from student WHERE id=$id";
	$result=$conn->query($sql3);
	$row = $result->fetch_assoc();
		
	$receiver = $row['fname'];
	?>
		<section >
		<form method="POST" action="">
			Mesage<input type="text" name="meso">
			<input type="hidden" value="<?php echo $receiver; ?>" name="receiver">
			<input type="submit" name="send" value="Send">
		</form>
		</section>
	<?php
		if(isset($_POST['send'])){
		//$user = $_SESSION["username"];

			$receiver = $_POST['receiver'];
			$user = $_SESSION["username"];
			$meso = $_POST['meso'];
			$sql ="INSERT INTO message(receiver,sender,message)values('$receiver','$user','$meso')";
			if($conn->query($sql)===TRUE){
				echo "message sent";
			}else{
				echo "message not sent";
			}
		}else{
			echo "";
		}
	}
/*$sql4 ="select * from message where receiver='Soke' and sender='Seizer' or receiver='Seizer' and sender='Soke'";
$res=$conn->query($sql4);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		echo "<table><tr>";
		if($row['receiver'] == 'Soke'){
			echo "<td style='background:lightgrey;'>". $row['message']."</td>";
		}else{
			echo "no message";
		}
		if($row['sender']=='Soke'){
			echo "<td style='background:yellow;'>". $row['message']."</td>";
		}else{
			echo"</tr></table>";
			}
		/*$sender =$row['sender'];
		$eceiver =$row['receiver'];
		 echo "<tr>";
		 echo "<td>" . $row['message'] . "</td>";
		echo "</tr>";*/
	//}*/
	
	$sql4 = "select * from message";
	$rs=$conn->query($sql4);
	if($rs->num_rows>0){
		$user = $_SESSION["username"];
		echo "<table>
				<tr>
					<th></th>
				</tr>";
		while($row=$rs->fetch_assoc()){
			echo "<tr>";
			if($row['sender']==$user){
				//echo "<td><button>".$row['message']."</button></td>";
				echo "<td style='float:right;'><sup>". $row['sender']."</sup>".$row['message']."</td>";
			}if($row['sender']!=$user){
				echo "<td><button><sup>". $row['sender']."</sup>".$row['message']."</button></td>";
			}
			echo "</tr>";
			//echo "<tr>";
			//echo "<td><sup>". $row['sender']."</sup>".$row['message']."</td>";
			//echo "</tr>";
		}
	}
//}	
?>
	</body>
</html>