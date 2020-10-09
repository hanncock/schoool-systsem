<section class="issuebook">
	<form action="" method="POST">
		<table>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td>Class Code</td>
				<td>Class Name</td>
				<td>Teacher</td>
				<td>No of students</td>
				<td>Streams</td>
			</tr>
			<tr>
				<td><input type="text" name="clscode"></td>
				<td><input type="text" name="clsname"></td>
				<td><input type="text" name="teacher"></td>
				<td><input type="text" name="nostudents"></td>
				<td><input type="text" name="streams"></td>
			</tr>
		</table>
		<input type="submit" value="Create Class" name="submit" class="submit">
	</form>
	<?php 
		require_once('connector.php');
		
		if(isset($_POST['clscode'])){
			$clscode = $_POST['clscode'];
			$clsname = $_POST['clsname'];
			$teacher = $_POST['teacher'];
			$nostudents = $_POST['nostudents'];
			$streams = $_POST['streams'];
			
			$sql = "INSERT INTO class(clscode,clsname,teacher,numstudents,streams)
					VALUES
				('$clscode','$clsname','$teacher','$nostudents','$streams')";
				
			if($conn->query($sql)===TRUE){
				echo"class created";
			}else{
				echo "Error:" ;
			}
		}
		
	
	?>
</section>
<section>
	<?php
		require_once('connector.php');
		
		if(isset($_GET['delete'])){
			$id = $_GET['delete'];
			
			$sql = "DELETE FROM class WHERE id=$id";
			$results = $conn->query($sql);
		}
		
		$sql = "SELECT * FROM class";
		$results = $conn->query($sql);
		
		if($results->num_rows > 0){
			echo "<table>
						<tr><b>
							<td>Class Code</td>
							<td>Class Name</td>
							<td>Teacher</td>
							<td>Students</td>
							<td>Streams</td></b>
						<tr>";	
			while($row=$results->fetch_assoc()){
				echo "<tr>";
					echo "<td>" .$row['clscode']. "</td>";
					echo "<td>" .$row['clsname']. "</td>";
					echo "<td>" .$row['teacher']. "</td>";
					echo "<td>" .$row['numstudents']. "</td>";
					echo "<td>" .$row['streams']. "</td>";
	?>
			<td>
				<button><a href="../logic/createclass.php?edit=<?php echo $row['id'] ?>">
					Edit<i class="fa fa-edit"  class="action"></i></a>
				</button>
				<button><a href="../logic/createclass.php?delete=<?php echo $row['id'] ?>">
					delete<i class="fa fa-dustbin"  class="action">
				</a></button>
			</td>
	<?php
				echo "</tr>";	
			}
		}
	?>
</section>