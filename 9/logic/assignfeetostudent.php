<section class="edit">
	<?php
		$admno = $_GET['edit'];
		$sql = "SELECT fname,sirname,tname,othername,admno,class,stream FROM student where  admno=$admno";
			$result=$conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
			}
			$sql = "SELECT fname,sirname,tname,othername,admno,class,stream FROM student where  admno=$admno";
			$result=$conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
			}
	?>
	<form method="POST">
		<h2>Charge Fees</h2>
		<table>
			<tr>
				<td class="label" style="color:blue;"><span style="color:white">Name:</span><?php echo $name; ?></td>
			</tr>
			<tr>
				<td>Select Package
					<select name="package">
						<option value="">---select Package---</option>
							<?php
								require_once('../logic/connector.php');
								$sql = "select * from fees";
								$result=$conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$price = $row['amnt'];
										echo "<option value='".$row['package']."'>".$row['package']."</option>";
									}
								}	
							?>
					</select>
				</td>
				<td><input type="date" name="date"></td>
				<td>
					<button  class="save" type="submit" name="save" value="<?php echo $admno; ?>">Save</button>
					<button class="close"><a href="studentfees.php" >Cancel</a></button>
				</td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['save'])){
			$name = $name;
			$admno = $admno;
			$package = $_POST['package'];
			$price = $price;
			$admno = $_GET['edit'];
			$sql ="insert into studentfees(name,package,price,admno)values('$name','$package','$price','$admno')";
			if($conn->query($sql) === TRUE){
				echo "Fee Package Charged"."<br>" ;	
			}else{
				echo "Error:";
			}	
		}
		$sql = "select * from studentfees where admno=$admno";
		$result=$conn->query($sql);
		if($result->num_rows > 0){
			echo "<table>
					<tr style='background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;'>
						<td>#</td>
						<td>Admission No</td>
						<td>Student Name</td>
						<td>Package Charged</td>
						<td>price</td>
						<td>Total</td>
					</tr>";
			while($row = $result->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['admno']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['package']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "<td>".$row['created_on']."</td>";
	?>
					<td>
						<button style="background:green;"><a href="addschool.php?edit=<?php echo $row['id'] ?>" >
							<i class="fa fa-edit"  class="action"></i></a>
						</button>
						<button style="background:red;"><a href="../logic/school.php?delete=<?php echo $row['id'] ?>">
							<i class="fa fa-trash"  class="action"></i></a>
						</button>
					</td>
	<?php
				echo "</tr>
				</table>";	
			}
		}
	?>
</section>							