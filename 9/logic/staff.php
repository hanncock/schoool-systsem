<?php
require_once('connector.php');
require_once('../php/session.php');
						
if(isset($_POST['AddStaff'])){	
	
	$names = $_POST['names'];
	$idno = $_POST['idno'];
	$gender = $_POST['gender'];
	$marital = $_POST['marital'];
	$residence = $_POST['residence'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$user = $_SESSION["username"];
	$dob = $_POST['dob'];
	
	$image = $_FILES['files']['name'];
	$target = "../files/".$image;

$sql = "insert into staff(names,idno,gender,marital,residence,phone,email,dob,user,path)
						VALUES
		('$names','$idno','$gender','$marital','$residence','$phone','$email','$dob','$user','$target')";

	if (move_uploaded_file($_FILES['files']['tmp_name'], $target)) {
  		$msg = "File uploaded successfully";
  	}else{
  		$msg = "Failed to upload file";
  	}
if($conn->query($sql) === TRUE){
			echo "class sucesfully created"."<br>" ;
			header("Location:../php/addstaff.php");
		}else{
			echo "Error:";
		}	
}else{
		echo "<span style='color:red'>enter missing school details</span>";
		
}	

$sql1="select * from staff";
$result=$conn->query($sql1);
	if ($result->num_rows > 0) {
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
	 echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['names'] . "</td>";	 
			echo "<td>" . $row['idno'] . "</td>";
			echo "<td>" . $row['gender'] . "</td>";
			echo "<td>" . $row['marital'] . "</td>";
			echo "<td>" . $row['residence'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
			echo "<td>" . $row['dob'] . "</td>";
			echo "<td>" . $row['created_by'] . "</td>";
			$pic = $row['path'];
			echo "<td><img src='$pic' style='width:100px;height:100px;'></td>";
			?>
			<td>
				<button style="background:green;"><a href="addstaff.php?edit=<?php echo $row['id'] ?>" >
					<i class="fa fa-edit"  class="action"></i></a>
				</button>
				<button style="background:red;"><a href="../logic/staff.php?delete=<?php echo $row['id'] ?>">
					<i class="fa fa-trash"  class="action"></i></a>
				</button>
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
		$sql2 =  "DELETE FROM staff WHERE id=$id";
		$result = $conn->query($sql2);
		header("Location:../php/addstaff.php");
	}
		?>
	
			<?php
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
		$sql3="select * from staff WHERE id=$id";
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
			<form method="POST" action="../logic/staff.php"class="addschl">
						<h2>Edit School</h2>
						<table>
							<tr>
								<td class="label">School Name</td>
								<td class="inputs"><input type="text" name="schlname" value="<?php echo $shclname; ?>"></td>
								<td class="label">School Location</td>
								<td class="inputs"><input type="text" name="schladdress" value="<?php echo $schladdress; ?>"></td>
								<td class="label">School Email</td>
								<td class="inputs"><input type="text" name="schlemail" value="<?php echo $schlemail; ?>"></td>
							</tr>
							<tr>
								<td class="label">School V.A.T</td>
								<td class="inputs"><input type="text" name="schlvat" value="<?php echo $schlvat; ?>"></td>
								<td class="label">School HealthNo.</td>
								<td class="inputs"><input type="text" name="schlhealth" value="<?php echo $schlhealth; ?>"></td>
								<td class="label">School Location</td>
								<td class="inputs"><input type="text" name="schllocation" value="<?php echo $schllocation; ?>"></td>	
								
							</tr>
							<tr>	
								<td class="label">School Pin</td>
								<td class="inputs"><input type="text" name="schlpin" value="<?php echo $schlpin; ?>"></td>
								<td class="label">School Phone</td>
								<td class="inputs"><input type="text" name="schlphone" value="<?php echo $schlphone; ?>"></td>
								<td class="label">School Website</td>
								<td class="inputs"><input type="text" name="schlwebsite" value="<?php echo $schlwebsite; ?>"></td>
					
							</tr>
						</table>
							<center>
								<button  type="submit" name="save" value="<?php echo $row['id']; ?>">Save</button>		
						</center>
					</form>
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

	$sql4 = "UPDATE schl SET schlname='$schlname',schladdress='$schladdress',schlvat='$schlvat',schlhealth='$schlhealth'
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