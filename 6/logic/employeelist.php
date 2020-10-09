<section class="edit">
<?php 
require_once('connector.php');
 
$sql = "select * from account";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
echo "<table width='100%' class=table >
<tr><b>
	<th>ID_NO</th>
	<th>Username</th>
	<th>Password</th>
	<th>Phone</th>
	<th>Gender</th>
	<th>Address</th>
	<th>Email</th>
	<th>Marital</th>
	<th></th>
	<th></th></b>
</tr>";		
    // output data of each row
    while($row = $result->fetch_assoc()) {
	 echo "<tr>";
			echo "<td>" . $row['ID_No'] . "</td>";	 
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['password'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
			echo "<td>" . $row['gender'] . "</td>";
			echo "<td>" . $row['adress'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['marital'] . "</td>";
			echo "<td><button>edit</button></td>";
			echo "<td><button>delete</button></td>";
			//echo "<td>" . $row['schllogo'] . "</td>";
	 echo "</tr>";
	}
	echo "</table>";
	}
	else{
		
		echo "no orders yet";
	}	
	
$conn->close();
 
?>
</section>