<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</head>
	<body>
		<section class="container">
			<?php include 'header.php' ?>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<h2>Transfer Activate/Deactivate Student</h2>
					<div class="tab">
						<a href="transfer.php">
							<button class="tablinks">
								<label class="labels" id="labels">Transfer Form/Class</label>
							</button>
						</a>	
						<a href="transferstudent.php">
							<button class="tablinks">
								<label class="labels" id="labels">Transfer Student</label>
							</button>
						</a>
						<a href="activatestudent.php">
							<button class="tablinks">
								<label class="labels" id="labels">Activate Student</label>
							</button>
						</a>
						<a href="deactivatestudent.php">
							<button class="tablinks">
								<label class="labels" id="labels">De-Activate Student</label>
							</button>
						</a>
					</div>
					<form method="POST" action="" class="addschl">
								<?php 
									include('../logic/connector.php');
									
									$sql ="SELECT * FROM student where status='Inactive'";
									$res = $conn->query($sql);
									if($res->num_rows>0){
										?>
										<table>
											<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
												<td>#</td>
												<td>Admn No</td>
												<td>Names of Student</td>
												<td>Class</td>
												<td>Stream</td>
												<td>Email</td>
												<td>Phone Number</td>
												<td>County</td>
												<td></td>
											</tr>
										
											<?php
												while($row=$res->fetch_assoc()){
													 echo "<tr>";
														echo "<td>" . $row['id'] . "</td>";	
														echo "<td>" . $row['admno'] . "</td>";	
														echo "<td>" . $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername']."</td>";
														echo "<td>" . $row['class'] . "</td>";
														echo "<td>" . $row['stream'] . "</td>";
														echo "<td>" . $row['email'] . "</td>";
														echo "<td>" . $row['phone'] . "</td>";
														echo "<td>" . $row['county'] . "</td>";
														?>
														<td>
															<button type="submit" name="activate" value="<?php echo $row['id']; ?>">Activate</button>
															<!--button style="background:green;"><a href="<!--?php echo $row['id'] ?>" >
																<i class="fa fa-edit"  class="action"></i></a>
															</button-->
														</td>
														<?php	
													echo "</tr>";
												}
											?>
										</table>
											<?php
									}else{
										echo "There are No Inactive Students";
									}
								?>
							
						</table>
					</form>
					<?php
						if(isset($_POST['activate'])){
							$id = $_POST['activate'];
							
							$sql = "update student set status='Active' where id=$id";
							//echo $sql;
							if($conn->query($sql)===TRUE){
								?>
								<section class="popup" name="popup" id="popup">
									<section class="meso">
										<center>
											<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
											Student Has Been Activated Succesffully<br><br><br>
											<a href="activatestudent.php">
											<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
											</a>
										</center>
									</section>
								</section>
								<?php
							}else{
								?>
								<section class="popup" name="popup" id="popup">
									<section class="meso">
										<center>
											<img src='../images/Error2.gif' style="width:100px;height:150px;"><br><br>
											!!!An Error Has Occured .....Try Agin!!!!<br><br><br>
											<a href="activatestudent.php">
											<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
											</a>
										</center>
									</section>
								</section>
								<?php
							}
						}
					?>
					
				</section>
			</section>
		</section>
	</body>
</html>