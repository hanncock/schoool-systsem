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

$sql = "insert into student(admno,fname,sirname,tname,othername,dob,gender,class,stream,email,phone,county)
						VALUES
		('$admno','$fname','$sirname','$tname','$oname','$dob','$gender','$class','$stream','$email','$phone','$county')";

	
if($conn->query($sql) === TRUE){
			
			echo "student added "."<br>" ;
			header("Location:../php/addstudent.php");
		}else{
			echo "Error:";
		}	
}else{
		echo "enter missing student details";
		//header("Location:../ui/addschool.php");
}	

$sql = "select * from student";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	 echo "<table><tr>";
			echo "<td>" . $row['id'] . "</td>";	
			echo "<td>" . $row['admno'] . "</td>";	
			echo "<td>" . $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername']."</td>";
			echo "<td>" . $row['dob'] . "</td>";
			echo "<td>" . $row['gender'] . "</td>";
			echo "<td>" . $row['admno'] . "</td>";
			echo "<td>" . $row['class'] . "</td>";
			echo "<td>" . $row['stream'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
			echo "<td>" . $row['county'] . "</td>";
	?>
			<td>
				<button style="background:green;"><a href="addstudent.php?edit=<?php echo $row['id'] ?>" >
					<i class="fa fa-edit"  class="action"></i></a>
				</button>
				<button style="background:red;"><a href="../logic/student.php?delete=<?php echo $row['id'] ?>">
					<i class="fa fa-trash"  class="action"></i>
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
	
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql2 =  "DELETE FROM student WHERE id=$id";
		$result = $conn->query($sql2);
		header("Location:../php/addstudent.php");
	}
	?>
		<?php
	if(isset($_GET['edit'])){
		
		$id = $_GET['edit'];
		
		$admno = $fname = $sirname = $tname = $oname = $dob = $gender = $class = $stream = $email = $phone = $county = ""; 
		
		$update = true;
		$sql3="select * from student WHERE id=$id";
		$result=$conn->query($sql3);
		$row = $result->fetch_assoc();
		
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
		 ?>
		 <section class="edit" name="edit">
			<script>
			function close(){
				document.getElementById('edit').style.display="none";
			}
			</script>
			
			<form action="../logic/student.php" class="addschl" method="POST">
						<h2>Add Student</h2>
						<table>
							<tr>
								<td class="label">First Name:</td>
								<td class="inputs"><input type="text" name="fname" value="<?php echo $fname ?>"></td>
								<td class="label">Sir Name</td>
								<td class="inputs"><input type="text" name="sirname" value="<?php echo $sirname ?>"></td>
								<td class="label">Third Name</td>
								<td class="inputs"><input type="text" name="tname" value="<?php $tname ?>"></td>
								<td class="label" rowspan="3" style="position:absolute;">
									<img src="../images/avatar.png" style="width:200px;height:180px;top:100px;right:20px;"><br>
									<input type="file" name="studentphoto">
								</td>
							</tr>
							<tr>
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
							<tr>
								<td class="label">Admission No</td>
								<td class="inputs"><input type="text" name="admno" value="<?php echo $admno ?>"></td>
								<td class="label">Class</td>
								<td class="inputs">
									<!--select name="class">
										<option value="">--select class--</option>
											<!--?php
												require_once('../logic/connector.php');
												$sql = "select * from class";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['clsname']."'>".$row['clsname']."</option>";
													}
												}	
											?>
									</select-->
								</td>
								<td class="label">Stream</td>
								<td class="inputs">
									<!--select name="stream">
										<option value="">-select Stream-</option>
											<!--?php
												require_once('../logic/connector.php');
												$sql = "select * from stream";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['strmname']."'>".$row['strmname']."</option>";
													}
												}	
											?>
									</select-->
								</td>
							</tr>
							<tr>	
								<td class="label">Email</td>
								<td class="inputs"><input type="text" name="email" value="<?php echo $email ?>"></td>
								<td class="label">Phone No</td>
								<td class="inputs"><input type="text" name="phone" value="<?php echo $phone ?>"></td>
								<td class="label">County</td>
								<td class="inputs">
									<!--select name="county">
										<option value="<!--?php echo $county ?>"><!--?php echo $county ?></option>
										<option value="Kisii">Kisii</option>
										<option value="Nyamira">Nyamira</option>
									</select-->
								</td>
							</tr>
						</table>
							<center>
								<button  class="save" type="submit" name="save" value="<?php echo $row['id']; ?>">Save</button>		
								<button class="close"><a href="addstudent.php" >Cancel</a></button>
							</center>
					</form>
		</section>
		 <?php
	}
	
	if(isset($_POST['save'])){	
		$id = $_POST['save'];
		$admno =$_POST['admno'];
		$fname = $_POST['fname'];
		$tname = $_POST['tname'];
		$sirname = $_POST['sirname'];
		$oname = $_POST['oname'];
		$dob =$_POST['dob'];
		$gender =$_POST['gender'];
		$class =$_POST['class'];
		$stream = $_POST['stream'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$county = $_POST['county'];

	$sql4 = "UPDATE student SET admno='$admno',fname='$fname',sirname='$sirname',tname='$tname',othername='$oname'
		,dob='$dob',gender='$gender',phone='$phone',class='$class',stream='$stream',email='$email' WHERE id=$id";

	
	if($conn->query($sql4) === TRUE){
			echo "school edited sucesfully"."<br>" ;
			header("Location:../php/addstudent.php");
		}else{
			echo "Error:";
		}	
	}else{
		echo "<span style='color:red'>enter missing school edit details</span>";
		
}

$conn->close();

?>