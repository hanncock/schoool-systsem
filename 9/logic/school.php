<?php
require_once('connector.php');

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
			header("Location:../php/addschool.php");
		}else{
			echo "Error:";
		}	
}else{
		echo "<span style='color:red'>enter missing school details</span>";
		
}	

$sql1="select * from school";
$result=$conn->query($sql1);
	if ($result->num_rows > 0) {
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
	 echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
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
	echo "</table>";
	}
	else{
		echo "no schools registered";
	}	
	
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql2 =  "DELETE FROM school WHERE id=$id";
		$result = $conn->query($sql2);
		header("Location:../php/addschool.php");
	}
	
	if(isset($_GET['edit'])){
		
		$id = $_GET['edit'];
		
		$schlname='';
		$schladdress='';
		$schlvat='';
		$schlhealth='';
		$schllocation='';
		$schlpin='';
		$schlwebsite='';
		$schlemail='';
		$schlphone='';
		
		$update = true;
		$sql3="select * from school WHERE id=$id";
		$result=$conn->query($sql3);
		$row = $result->fetch_assoc();
		
		$shclname = $row['schlname'];
		$schladdress = $row['schladdress'];
		$schlvat = $row['schlvat'];
		$schlhealth = $row['schlhealth'];
		$schllocation = $row['schllocation'];
		$schlpin = $row['schlpin'];
		$schlwebsite = $row['website'];
		$schlemail = $row['email'];
		$schlphone = $row['schlphone'];
		 ?>
		 <section class="edit">
		 <section class="editinfo">
			<form method="POST" action="../logic/school.php"class="addschl">
						<h2>Edit School</h2>
						<table>
							<tr style="height:100px;">
								<td class="label">School Name</td>
								<td class="inputs"><input type="text" name="schlname" value="<?php echo $shclname; ?>"></td>
								<td class="label">School Location</td>
								<td class="inputs"><input type="text" name="schladdress" value="<?php echo $schladdress; ?>"></td>
								<td class="label">School Email</td>
								<td class="inputs"><input type="text" name="schlemail" value="<?php echo $schlemail; ?>"></td>
							</tr>
							<tr style="height:100px;">
								<td class="label">School V.A.T</td>
								<td class="inputs"><input type="text" name="schlvat" value="<?php echo $schlvat; ?>"></td>
								<td class="label">School HealthNo.</td>
								<td class="inputs"><input type="text" name="schlhealth" value="<?php echo $schlhealth; ?>"></td>
								<td class="label">School Location</td>
								<td class="inputs"><input type="text" name="schllocation" value="<?php echo $schllocation; ?>"></td>	
								
							</tr>
							<tr style="height:100px;">	
								<td class="label">School Pin</td>
								<td class="inputs"><input type="text" name="schlpin" value="<?php echo $schlpin; ?>"></td>
								<td class="label">School Phone</td>
								<td class="inputs"><input type="text" name="schlphone" value="<?php echo $schlphone; ?>"></td>
								<td class="label">School Website</td>
								<td class="inputs"><input type="text" name="schlwebsite" value="<?php echo $schlwebsite; ?>"></td>
					
							</tr>
							
						</table><br><br><br>
						<center>
							<button  class="save" type="submit" name="save" value="<?php echo $row['id']; ?>">Save</button>
							<button class="close"><a href="../php/addschool.php" >Cancel</a></button>								
						</center>
					</form>
			</section>		
		</section>
		 <?php
	}
	
	if(isset($_POST['save'])){	
		$id = $_POST['save'];
		$schlname = $_POST['schlname'];
		$schladdress = $_POST['schladdress'];
		$schlvat=$_POST['schlvat'];
		$schlhealth=$_POST['schlhealth'];
		$schllocation=$_POST['schllocation'];
		$schlpin=$_POST['schlpin'];
		$schlphone=$_POST['schlphone'];
		//$schllogo = $_POST['schlogo'];
		$schlwebsite = $_POST['schlwebsite'];
		$schlemail = $_POST['schlemail'];

	$sql4 = "UPDATE school SET schlname='$schlname',schladdress='$schladdress',schlvat='$schlvat',schlhealth='$schlhealth'
		,schllocation='$schllocation',schlpin='$schlpin',schlphone='$schlphone',logo='$schlogo',website='$schlwebsite'
		,email='$schlemail' WHERE id=$id";

	
	if($conn->query($sql4) === TRUE){
			echo "school edited sucesfully"."<br>" ;
			header("Location:../php/addschool.php");
		}else{
			echo "Error:";
		}	
	}else{
		echo "<span style='color:red'>enter missing school edit details</span>";
		
}

$conn->close();

?>