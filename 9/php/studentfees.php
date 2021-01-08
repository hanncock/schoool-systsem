<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
			function showHint(str) {
				if (str.length == 0) {
					 document.getElementById("package").innerHTML = "";
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						 document.getElementById("txtHint").innerHTML = this.responseText;
						 document.getElementById("price").value=document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "../logic/searchdb.php?package=" + str, true);
				xmlhttp.send();
				}
			}
		</script>
	</head>
	<body>
		<section class="container">
			<section class="header">
				<img src="../images/logo.png" class="logo">
				<form action="" method="POST" class="search">
					<input type="text" name="search" placeholder="Search..." class="srchtxt">
					<button type="submit" class="srchbtn"><i class="fa fa-search"></i></button>
				</form>	
				<span class="icons">
					<i class="fa fa-envelope"></i>
					<i class="fa fa-phone"></i>
					<i class="fa fa-phone"></i>
					<i class="fa fa-phone"></i>
				</span>
				<span class="user">
					<img src="../images/avatar.png" class="userimg"> <br>
				<span>
			</section>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<h2>Charge Fees</h2>
					<div class="tab">
						<a href="studentfees.php">
							<button class="tablinks">
								<label class="labels" id="labels">Charge Student</label>
							</button>
						</a>
						<a href="streamfees.php">
							<button class="tablinks">
								<label class="labels" id="labels">Charge Stream</label>
							</button>
						</a>
						<a href="formfees.php">
							<button class="tablinks">
								<label class="labels" id="labels">Charge Form/Class</label>
							</button>
						</a>	
					</div>
					<form method="POST" action="studentfees.php">
						<table>
							<tr>
								<td class="label">Admission</td>
								<td class="inputs"><input type="text" name="admno"></td>
								<td><input type="submit" name="search" value="Search" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>
							</tr>
							
						</table>
					</form>
					<section class="schls">
						
						
								<?php include '../logic/feesstmt.php' ?>
						
						<?php
							require_once('../logic/connector.php');
							if(isset($_POST['search'])){
								?>
								<table style="width:100%;">
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:2.5rem;" >
									<td>#</td>
									<td>Admisson No</td>
									<td>Names</td>
									<td>Class</td>
									<td>Stream</td>
									<td>Charged Amount</td>
									<td>Paid</td>
									<td></td>
							</tr>
								<?php
								$admno = $_POST['admno'];
								$sql = "SELECT id,fname,sirname,tname,othername,admno,class,stream FROM student where  admno LIKE '%$admno%' ";
								$result=$conn->query($sql);
								if ($result->num_rows > 0) {	
									// output data of each row
									while($row = $result->fetch_assoc()) {
										echo "<tr>";
											echo "<td>".$row['id']."</td>";
											echo "<td>".$row['admno']."</td>";
											$GLOBAL['names'] = $row['fname'];
											echo "<td>". $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername']."</td>";
											echo "<td>". $row['class']."</td>";
											echo "<td>". $row['stream']."</td>";
											echo "<td>". $fees."</td>";
						?>
											<td>
												<button style="background:green;"><a href="studentfees.php?edit=<?php echo $row['admno'] ?>" >
													<i class="fa fa-edit"  class="action"></i></a>
												</button>
											</td>
						<?php
									//echo "<td>". $row['']."</td>";
										echo "</tr>";
									}
										echo "</table>";
									}else{
										echo "no records found";
								}	
							}
						?>
						</table>
					</section>
						<?php
							if(isset($_GET['edit'])){
								$admno = $_GET['edit'];
								$sql = "SELECT fname,sirname,tname,othername,admno,class,stream FROM student where  admno=$admno";
								$result=$conn->query($sql);
								if ($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
								}
								?>
								<section  class="edit">
									<section class="editinfo">
										<form method="POST" action="">
										<!--First name: <input type="text" onkeyup="showHint(this.value)" name="fname"-->
											<h2>Charge Student Fees</h2>
												<table style="width:100%;">
													<tr>
														<td class="label" style="color:blue;"><span style="color:white">Name:</span><?php echo $name; ?></td>
													</tr>
													<tr>
														<td>Select Package
															<select name="package" id="package" name="package"  onchange="showHint(this.value)">
																<option value="" >---select Package---</option>
																	<?php
																		require_once('../logic/connector.php');
																		$sql = "select * from fees";
																		$result=$conn->query($sql);
																		if ($result->num_rows > 0) {
																			while($row = $result->fetch_assoc()) {
																				//$price = $row['amnt'];
																				echo "<option value='".$row['package']."'>".$row['package']."</option>";
																			}
																		}	
																	?>
															</select>
														</td>
														<td>
															<p>C: <span id="txtHint"></span></p>
															<input type="hidden" name="price" id="price">
														</td>
														<td><input type="date" name="date"></td>
														<td>
															<button  class="save" type="submit" name="save" value="<?php echo $admno; ?>">Charge</button>
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
			$price = $_POST['price'];
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
			echo "<table style='width:100%'>
					<tr style='background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:2.5rem;'>
						<td>#</td>
						<td>Admission No</td>
						<td>Student Name</td>
						<td>Package Charged</td>
						<td>price</td>
						<td>Total</td>
						<td></td>
					</tr>";
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				$id = $row['id'];
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['admno']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['package']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "<td>".$row['created_on']."</td>";
	?>
					<td>
						<button style="background:green;"><a href="studentfees.php?edit=<?php echo $id; ?>" >
							<i class="fa fa-edit"  class="action"></i></a>
						</button>
						<button style="background:red;"><a href="studentfees.php?delete=<?php echo $id; ?>">
							<i class="fa fa-trash"  class="action"></i></a>
						</button>
					</td>
	<?php	
				echo "</tr>";
			}
			echo "</table>";
		}
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql2 =  "DELETE FROM studentfees WHERE id=$id";
		$result = $conn->query($sql2);
		if($conn->query($sql2) === TRUE){
			echo "Fee Package Removed sucesfully"."<br>" ;
			header("Location:../php/student.php?delete");
		}	
	}
	
?>

<?php
						if(isset($_GET['delete'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										School Has Been Deleted Succesffully<br><br><br>
										<a href="addschool.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
							<?php
						}
					
					if(isset($_GET['popup'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										School Has Been Deleted Succesffully<br><br><br>
										<a href="addschool.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
							<?php
						}
					?>
									</section>
								</section>
								<?php
							}	
						?>
						
						
				</section>
			</section>
		</section>
	</body>
</html>