<?php 
	require('connector.php');
	
	if(isset($_POST['CreateSchool'])){
		$schlname = $_POST['schlname'];
		$schladdress = $_POST['schladdress'];
		$schlvat=$_POST['schlvat'];
		$schlhealth=$_POST['schlhealth'];
		$schllocation=$_POST['schllocation'];
		$schlpin=$_POST['schlpin'];
		$schlphone=$_POST['schlphone'];
		$schllogo = $_POST['schlogo'];
		$schlwebsite = $_POST['schlwebsite'];
		$schlemail = $_POST['schlemail'];

		$sql = "insert into school(schlname,schladdress,schlvat,schlhealth,schllocation,schlpin,schlphone,logo,website,email)
						VALUES
			('$schlname','$schladdress','$schlvat','$schlhealth','$schllocation','$schlpin','$schlphone','$schllogo','$schlwebsite','$schlemail')";

	
		if($conn->query($sql) === TRUE){	
			echo "school sucesfully created"."<br>" ;
			//header("Location:../ui/addschool.php");
		}else{
			echo "Error:";
		}	
	}
	
	
	
	
	
	$sql = "select * from school ";
	$res = $conn->query($sql);
	if($res->num_rows > 0){
		echo "<table class='schls'>
				<tr style='background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;' >
						<td>#</td>
						<td>School Name</td>
						<td>School Adress</td>
						<td>School V.A.T</td>
						<td>School Health</td>
						<td>School Location</td>
						<td>School Pin</td>
						<td>School Phone</td>
						<td>School Website</td>
						<td>School Email</td>
						<td></td>
					</tr>";
			echo "<tr>";
		while($row = $res->fetch_assoc()){
			echo "<td>". $row['id']. "</td>";
			echo "<td>". $row['schlname']. "</td>";
			echo "<td>". $row['schladdress']. "</td>";
			echo "<td>". $row['schlvat']. "</td>";
			echo "<td>". $row['schlhealth']. "</td>";
			echo "<td>". $row['schllocation']. "</td>";
			echo "<td>". $row['schlpin']. "</td>";
			echo "<td>". $row['schlphone']. "</td>";
			echo "<td>". $row['website']. "</td>";
			echo "<td>". $row['email']. "</td>";
			?>
			<td>
				<button style="background:green;"><a href="addschool.php?edit=<?php echo $row['id'] ?>" >
					<i class="fa fa-edit"  class="action"></i></a>
				</button>
				<button style="background:red;"><a href="../logic/school.php?delete=<?php echo $row['id'] ?>">
					<i class="fa fa-trash"  class="action"></i>
				</a></button>
			</td>
				<?php
			echo "</tr>";
		}
	}
?>