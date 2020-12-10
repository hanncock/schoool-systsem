<?php
	require_once('connector.php');
	if(isset($_POST['AddStudent'])){	
		$admno =$_POST['admno'];
		$fname = $_POST['fname'];
		$sirname = $_POST['sirname'];
		$tname = $_POST['tname'];
		$oname = $_POST['oname'];
		$dob =$_POST['dob'];
		$gender =$_POST['gender'];
		$class =$_POST['class'];
		$stream = $_POST['stream'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$county = $_POST['county'];
		$status = 'Active';

		$sql = "insert into student(admno,fname,sirname,tname,othername,dob,gender,class,stream,email,phone,county,status)
						VALUES
			('$admno','$fname','$sirname','$tname','$oname','$dob','$gender','$class','$stream','$email','$phone','$county','$status')";

		if($conn->query($sql) === TRUE){
			header("Location:../php/addstudent.php?popup");
		}else{
			header("Location:../php/addstudent.php?error");
		}	
	}	

	$sql = "select * from student";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		?>
		<table style="width:100%">
							<h2>Student List</h2>
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:3rem;" >
									<td>#</td>
									<td>Admission No</td>
									<td>Names of Student</td>
									<td>Date Of Birth</td>
									<td>Gender</td>
									<td>Class</td>
									<td>Stream</td>
									<td>Email</td>
									<td>Phone Number</td>
									<td>County</td>
									<td></td>
							</tr>
			<?php
			while($row = $result->fetch_assoc()) {
				echo "<tr style='height:3rem;'>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['id'] . "</td>";	
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['admno'] . "</td>";	
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername']."</td>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['dob'] . "</td>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['gender'] . "</td>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['class'] . "</td>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['stream'] . "</td>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['email'] . "</td>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['phone'] . "</td>";
					echo "<td style=' border-bottom: 1px solid white;'>" . $row['county'] . "</td>";
			?>
			<td>
				<button style="background:#23263C;"><a href="editstudent.php?edit=<?php echo $row['id'] ?>" >
					<i class="fa fa-edit" style="color:white;"  class="action"></i></a>
				</button>
				<button style="background:white;"><a href="../logic/editstudent.php?delete=<?php echo $row['id'] ?>">
					<i class="fa fa-trash"  style="color:red;" class="action"></i>
				</a></button>
			</td>
			<?php	
			echo "</tr>";
			}
		echo "</table>";
	}
	else{
		echo "no students ";
	}
	
	
	
	if(isset($_GET['edit'])){
		
		$id = $_GET['edit'];
		
		$admno = $fname = $sirname = $tname = $oname = $dob = $gender = $class = $stream = $email = $phone = $county = ""; 
		
		$update = true;
		$sql3="select * from student WHERE id=$id";
		$result=$conn->query($sql3);
		$row = $result->fetch_assoc();
		
		$id = $row['id'];
		$admno =$row['admno'];
		$fname = $row['fname'];
		$sirname = $row['sirname'];
		$tname = $row['tname'];
		$oname = $row['othername'];
		$dob = $row['dob'];
		$gender = $row['gender'];
		$class = $row['class'];
		$stream = $row['stream'];
		$email = $row['email'];
		$phone = $row['phone'];
		$county = $row['county'];
		$status = $row['status'];
		 ?>
		 <section class="edit" >
			<section class="editinfo">
			<form action="../logic/editstudent.php" class="addschl" method="POST">
				<h2>Add Student</h2>
				<table>
					<tr style="height:100px;">
						<td class="label">First Name:</td>
						<?php echo 'this is the'.$id;?>
						<td class="inputs"><input type="text" name="fname" value="<?php echo $fname ?>"></td>
						<td class="label">Sir Name</td>
						<td class="inputs"><input type="text" name="sirname" value="<?php echo $sirname ?>"></td>
						<td class="label">Third Name</td>
						<td class="inputs"><input type="text" name="tname" value="<?php echo $tname ?>"></td>
						<td class="label" rowspan="3" style="position:absolute;">
							<img src="../images/avatar.png" style="width:200px;height:180px;top:100px;right:20px;"></br>
							<input type="file" name="studentphoto">
						</td>
					</tr>
					<tr style="height:100px;">
						<td class="label">Other Name</td>
						<td class="inputs"><input type="text" name="oname" value="<?php echo $oname ?>"></td>
						<td class="label">D.O.B</td>
						<td class="inputs"><input type="date" name="dob" value="<?php echo $dob ?>"></td>
						<td class="label">Gender</td>
						<td class="inputs">
							<select name="gender">
								<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</td>	
					</tr>
					<tr style="height:100px;">
						<td class="label">Admission No</td>
						<td class="inputs"><input type="text" name="admno" value="<?php echo $admno ?>"></td>
						<td class="label">Class</td>
						<td class="inputs">
							<select name="class">
								<option value="<?php echo $class ?>"><?php echo $class ?></option>
									<?php
										require_once('../logic/connector.php');
										$sql = "select * from class";
										$result=$conn->query($sql);
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<option value='".$row['clsname']."'>".$row['clsname']."</option>";
											}
										}	
									?>
							</select>
						</td>
						<td class="label">Stream</td>
						<td class="inputs">
							<select name="stream">
								<option value="<?php echo $stream ?>"><?php echo $stream ?></option>
									<?php
										require_once('../logic/connector.php');
										$sql = "select * from stream";
										$result=$conn->query($sql);
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<option value='".$row['strmname']."'>".$row['strmname']."</option>";
											}
										}	
									?>
							</select>
						</td>
					</tr>
					<tr style="height:100px;">	
						<td class="label">Email</td>
						<td class="inputs"><input type="text" name="email" value="<?php echo $email ?>"></td>
						<td class="label">Phone No</td>
						<td class="inputs"><input type="text" name="phone" value="<?php echo $phone ?>"></td>
						<td class="label">County</td>
						<td class="inputs">
							<select name="county">
								<option value="<?php echo $county ?>"><?php echo $county ?></option>
								<option value="Kisii">Kisii</option>
								<option value="Nyamira">Nyamira</option>
							</select>
						</td>
						<td class="label">status</td>
						<td class="inputs">
							<select name="status">
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
						</td>
					</tr>
				</table>
				<center>
					<button  class="save" type="submit" name="save" value="<?php echo $id; ?>">Save</button>	
					<button class="close"><a href="../php/editstudent.php" >Cancel</a></button>
					</center>
			</form>
			</section>
		</section>
		 <?php
	}
	
	
	/*if(isset($_POST['save'])){	
	
		

		

		//echo $sql4;
		if($conn->query($sql4) === TRUE){
			header("Location:addstudent.php");
		}else{
			echo "connection error";
		}
		
	}*/

$conn->close();

?>