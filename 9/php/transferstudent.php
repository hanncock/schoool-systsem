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
					<form method="POST" action="" onsubmit="return validateForm()" name="exam"> 
						<td class="label">admno</td>
						<td class="inputs"><input type="text" name="admno"></td>
						<td><input type="submit" name="query" value="Query" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>	
					</form>
					<?php
						require_once('../logic/connector.php');
						if(isset($_POST['query'])){
							$admno = $_POST['admno'];
							$sql = "select * from student where admno='$admno'" ;
							//echo $sql;
							$result=$conn->query($sql);
							if($result->num_rows>0){
								?>
								<form action="../logic/transferstudent.php" class="addschl" name="school" onsubmit="return validateForm()" method="POST">
									<h2>Transfer Student</h2>	
									<table>
										<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
											<td>Admission No</td>
											<td>Names of Student</td>
											<td>Current Class</td>
											<td>Current Stream</td>
										
										</tr>
									<?php
									 while($row = $result->fetch_assoc()) {
										echo "<tr>";
										?>
										<td><input type="hidden" name="admno" value="<?php echo $row['admno'];?>"><?php echo $row['admno'];?></td>
										<?php
											//echo "<td>" . $row['admno'] . "</td>";	
											echo "<td>" . $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername']."</td>";
											echo "<td>" . $row['class'] . "</td>";
											echo "<td>" . $row['stream'] . "</td>";
											$strm = $row['stream'];
											$admno = $row['admno'];
											?>
											<span class="labels">Class/Form To:</span>
											<select name="classto" required>
												<option value="<?php echo $row['class'];?>"><?php echo $row['class'];?></option>
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
											<span class="labels">Class To:</span>
											<select name="streamto" required>
												<option value="<?php echo $strm;?>"><?php echo $strm; ?></option>
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
											<?php

										echo "</tr>";
									}
									?>
										<tr>
											<center>
												<td >
													<input type="submit" name="transfer" value="transfer" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
												</td>
											</center>
										</tr>
								</form>
								<?php
							}
							
						}
						
					?>
					<?php
						if(isset($_GET['popup'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Student Has Been Transfered Succesffully<br><br><br>
										<a href="transferstudent.php">
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
		</section>
	</body>
</html>