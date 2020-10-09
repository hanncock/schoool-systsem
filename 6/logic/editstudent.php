<section class="editStudent">
<?php 
require('connector.php');

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql =  "DELETE FROM student WHERE admno=$id";
		$result = $conn->query($sql);
	}
	
	$fname = "";
	$update = false;
	$admno = "";
	$sirname = "";
	
	if(isset($_GET['edit'])){
		$admno = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM student WHERE admno=$admno";
		//$result = $mysqli->query("SELECT * FROM student WHERE id=$id")or die($mysqli->error());
		$result = $conn->query($sql);
		//if(count($result)==1){
			if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$fname = $row['fname'];
			$sirname = $row['sirname'];
			//$location = $row['location'];
		}
	}
 
$sql = "select * from student";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo '<h2><center>Student List</center></h2>';
echo "<table width='100%' class=table >
<tr><b>
	<th>Admission No</th>
	<th>First Name</th>
	<th>Sir Name</th>
	<th>Third Name</th>
	<th>Other Names</th>
	<th>D.O.B</th>
	<th>Gender</th>
	<th>Class</th>
	<th>Stream</th>
	<th>Email</th>
	<th>Phone</th>
	<th></th>
	<th></th>
	</b>
</tr>";		
    // output data of each row
    while($row = $result->fetch_assoc()) {
	 echo "<tr>";
			echo "<td>" . $row['admno'] . "</td>";			
			echo "<td>" . $row['fname'] . "</td>";
			echo "<td>" . $row['sirname'] . "</td>";
			echo "<td>" . $row['othername'] . "</td>";
			echo "<td>" . $row['dob'] . "</td>";
			echo "<td>" . $row['gender'] . "</td>";
			echo "<td>" . $row['admno'] . "</td>";
			echo "<td>" . $row['class'] . "</td>";
			echo "<td>" . $row['stream'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
	?>
			<td>
				<button>
					<a href="../logic/editstudent.php?edit=<?php echo $row['admno'] ?>">Edit</a>
				</button>
				<button>
					<a href="../logic/editstudent.php?delete=<?php echo $row['admno'] ?>">Delete</a>
				</button>
			</td>
		<?php	
	 echo "</tr>";
	}
	echo "</table>";
	}
	else{
		
		echo "no students ";
	}	
	
$conn->close();
 
?>
<form action="editstudent.php" method="POST">
	<input type="hidden" name="admno" value=<?php echo $admno; ?>
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $fname ;?>">
		<label>Location</label>
		<input type="text" name="location" value="<?php echo $sirname ?>">
		<?php if($update == true):?>
		<button type="submit" name="update">Update</button>
		<?php else: ?>
		<button type="submit" name="save">Save</button>
		<?php endif; ?>
</form>
</section>