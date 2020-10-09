<?php
require_once('connector.php');

if(isset($_POST['CreateClass'])){	
	
	$clscode = $_POST['clscode'];
	$clsname = $_POST['clsname'];
	$teacher = $_POST['teacher'];
	$numstudents = $_POST['numstudents'];
	$streams = $_POST['streams'];
	
$sql = "insert into class(clscode,clsname,teacher,numstudents,streams)
						VALUES
		('$clscode','$clsname','$teacher','$numstudents','$streams')";

	
if($conn->query($sql) === TRUE){
			
			echo "school sucesfully created"."<br>" ;
			header("Location:../php/createclass.php");
		}else{
			echo "Error:";
		}	
}else{
		echo "<span style='color:red'>enter missing class details</span>";
		
}	

$sql1="select * from class";
$result=$conn->query($sql1);
	if ($result->num_rows > 0) {
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
	 echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['clscode'] . "</td>";	 
			echo "<td>" . $row['clsname'] . "</td>";
			echo "<td>" . $row['streams'] . "</td>";
			echo "<td>" . $row['teacher'] . "</td>";
			echo "<td>" . $row['numstudents'] . "</td>";
			?>
			<td>
				<button style="background:green;"><a href="createclass.php?edit=<?php echo $row['id'] ?>" >
					<i class="fa fa-edit"  class="action"></i></a>
				</button>
				<button style="background:red;"><a href="../logic/class.php?delete=<?php echo $row['id'] ?>">
					<i class="fa fa-trash"  class="action">
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
		$sql2 =  "DELETE FROM class WHERE id=$id";
		$result = $conn->query($sql2);
		header("Location:../php/createclass.php");
	}
		?>
	
			<?php
	if(isset($_GET['edit'])){
		
		$id = $_GET['edit'];
		
		$clscode = $clsname = $teacher = $numstudents = $streams = "";
		
		$update = true;
		$sql3="select * from class WHERE id=$id";
		$result=$conn->query($sql3);
		$row = $result->fetch_assoc();
		
		$clscode = $row['clscode'];
		$clsname = $row['clsname'];
		$teacher = $row['teacher'];
		$numstudents = $row['numstudents'];
		$streams = $row['streams'];
		 ?>
		 <section class="edit">
			<form method="POST" action="../logic/class.php"class="addschl">
						<h2>Edit School</h2>
						<table>
							<tr>
								<td class="label">Class Code:</td>
								<td class="inputs"><input type="text" name="clscode" value="<?php echo $clscode; ?>"></td>
								<td class="label">Class Name:</td>
								<td class="inputs"><input type="text" name="clsname" value="<?php echo $clsname; ?>"></td>
								<td class="label">Stream</td>
								<td class="inputs"><select name="streams" >
														<option value="<?php echo $streams;?>"><?php echo $streams; ?></option>
														<!--?php
													
															$sql = "select * from stream";
															$result=$conn->query($sql);
															if ($result->num_rows > 0) {
																while($row = $result->fetch_assoc()) {
																	echo "<option value='".$row['strmname']."'>".$row['strmname']."</option>";
																}
															}	
														?--->
													</select>
								</td>
								<td class="label">Teacher:</td>
								<td class="inputs">
									<select name="teacher" >
										<option value="<?php echo $teacher;?>"><?php echo $teacher; ?></option>
									
											<?php
												$sql = "select * from staff";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['names']."'>".$row['names']."</option>";
													}
												}else{
													echo "";
												}
											?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="label">No. Students:</td>
								<td class="inputs"><input type="int" name="numstudents" ></td>
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
		$clscode = $_POST['clscode'];
		$clsname = $_POST['clsname'];
		$teacher = $_POST['teacher'];
		$numstudents = $_POST['numstudents'];
		$streams = $_POST['streams'];

	$sql4 = "UPDATE class SET clscode='$clscode',clsname='$clsname',teacher='$teacher',streams='$streams' WHERE id=$id";

	
	if($conn->query($sql4) === TRUE){
			echo "school edited sucesfully"."<br>" ;
			header("Location:../php/createclass.php");
		}else{
			echo "Error:";
		}	
	}else{
		echo "<span style='color:red'>enter missing school edit details</span>";
		
}

$conn->close();

?>