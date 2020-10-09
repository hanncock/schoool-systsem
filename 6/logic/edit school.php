<section class="editschool">
<?php 
require_once('connector.php');

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql =  "DELETE FROM schl WHERE id=$id";
		$result = $conn->query($sql);
	}
	
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$update = true;
			//$result = $mysqli->query("SELECT * FROM data WHERE id=$id")or die($mysqli->error());
		if(count($result)==1){
			$row = $result->fetch_array();
			$name = $row['name'];
			$location = $row['location'];
		}
	}
 
$sql = "select * from schl";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
	 echo "<tr>";
			echo "<td>" . $row['schlname'] . "</td>";	 
			echo "<td>" . $row['schladdress'] . "</td>";
			echo "<td>" . $row['schlvat'] . "</td>";
			echo "<td>" . $row['schlhealth'] . "</td>";
			echo "<td>" . $row['schllocation'] . "</td>";
			echo "<td>" . $row['schlpin'] . "</td>";
			echo "<td>" . $row['website'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['schlphone'] . "</td>";
			?>
			<td>
				<button><a href="../logic/edit school.php?edit=<?php echo $row['id'] ?>">
					<i class="fa fa-edit"  class="action"></i></a>
				</button>
				<button><a href="../logic/edit school.php?delete=<?php echo $row['id'] ?>">
					delete<i class="fa fa-dustbin"  class="action">
				</a></button>
			</td>
	<?php
	 echo "</tr>";
	}
	echo "</table>";
	}
	else{
		echo "no schools registered";
	}	
	
$conn->close();
 
?>
</section>