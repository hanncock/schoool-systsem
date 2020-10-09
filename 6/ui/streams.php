<section class="issuebook">
	<form action="streams.php" method="POST">
		<table>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td>Stream Code</td>
				<td>Stream Name</td>
				<td>No of students</td>
			</tr>
			<tr>
				<td><input type="text" name="strmcode"></td>
				<td><input type="text" name="strmname"></td>
				<td><input type="text" name="nostudents"></td>
			</tr>
		</table>
		<input type="submit" value="Create Stream" name="submit" class="submit">
	</form>
	<?php 
	require_once('../logic/connector.php');
	
		if(isset($_POST['strmcode'])){
			$strmcode = $_POST['strmcode'];
			$strmname = $_POST['strmname'];
			$numstudents = $_POST['nostudents'];
			
			$sql = "INSERT INTO stream('strmcode','strmname','numstudents')
						VALUES
					('$strmcode','$strmname','$numstudents')";
					
			if($conn->query($sql)===TRUE){
				echo"stream created";
			}else{
				echo "Error:" ;
			}
		}
	?>
</section>
<section>
	<?php 
		require_once('../logic/connector.php');
		
		
		
		$sql = "SELECT * FROM stream";
		$results = $conn->query($sql);
		
		if($results->num_rows > 0){
			echo "<table>
					<tr>
						<td>#</td>
						<td>Stream Name</td>
						<td>Students</td>
					</tr>";	
			while($row=$results->fetch_assoc()){
				echo "<tr>";
						echo "<td>" .$row['strmcode']. "</td>";
						echo "<td>" .$row['strmname']. "</td>";
						echo "<td>" .$row['numstudents']. "</td>";
				echo "</tr>";
			}		
		}else{
			echo "no records";
		}
	?>
</section>