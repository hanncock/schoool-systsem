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
					<form method="POST" action="">
						<table>
							<tr>
								<td class="label">Stream</td>
								<td class="inputs">
									<select name="stream">
										<option value="">-select Stream-</option>
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
								<td class="label">Class</td>
								<td class="inputs">
									<select name="class">
										<option value="">-select Class-</option>
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
									<td><input type="submit" name="search" value="Search" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>
							</tr>
							
						</table>
					</form>
					<section class="schls">
						<form method="POST" action="">
						
								<!--?php include '../logic/feesstmt.php' ?-->
						
						<?php
							require_once('../logic/connector.php');
							if(isset($_POST['search'])){
								?>
								<table style='width:100%'>
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:2.5rem;" >
									<td>#</td>
									<td>Admisson No</td>
									<td>Names</td>
									<td>Class</td>
									<td>Stream</td>
									<td>Package Charged</td>
									<td>Amount</td>
									
							</tr>
								<?php
								$package = $_POST['package'];
								$class = $_POST['class'];
								$stream = $_POST['stream'];
								$sql = "SELECT fname,sirname,tname,othername,admno,class,stream FROM student where  class='$class' AND stream='$stream' ";
								//echo $sql;
								$result=$conn->query($sql);
								
								$sql1 = "select * from fees where package='$package'";
								$res=$conn->query($sql1);
								if ($res->num_rows > 0) {
									$row=$res->fetch_assoc();
									$amount = $row['amnt'];
								}
								if ($result->num_rows > 0) {	
									// output data of each row
									while($row = $result->fetch_assoc()) {
										echo "<tr style='height:2.5rem;'>";
											echo "<td></td>";
											$admno = $row['admno']."</td>";
											$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
											$stream = $row['stream']; 
						?>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "admno[]"; ?>" value="<?php echo $admno; ?>"><?php echo $admno; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "names[]"; ?>" value="<?php echo $name; ?>"><?php echo $name; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "class[]"; ?>" value="<?php echo $class; ?>"><?php echo $class; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "stream[]"; ?>" value="<?php echo $stream; ?>"><?php echo $stream; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "package[]"; ?>" value="<?php echo $package; ?>"><?php echo $package; ?></td>	
										<td class="labels" style="color:blue;border-bottom: 1px solid white;"><input type="hidden" name="<?php echo "amount[]"; ?>" value="<?php echo $amount; ?>"><?php echo $amount; ?></td>	
						<?php
									//echo "<td>". $row['']."</td>";
										echo "</tr>";
									}
									?>
									<tr>
										<td></td>
										<td><input type="submit" name="chargestream" value="Charge Stream" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
									</td>
									</tr>
									<?php
										echo "</table>";
									}else{
										echo "no records found";
								}	
							}
						?>
						</form>
						
					</section>
				</section>
				<?php
					if(isset($_POST['chargestream'])){
	require('../logic/connector.php');
	($_POST);
		
	$admno = count($_POST['admno']);
//	echo $admno;
	$sql = "insert into `studentfees`(`name`,`package`,`price`,`admno`)values";
	for($i=0; $i<$admno; $i++){
		$sql .="('".$_POST["names"][$i]."','".$_POST["package"][$i]."','".$_POST["amount"][$i]."','".$_POST["admno"][$i]."'),";
	}
	//echo $sql;
	$finalQuery = rtrim($sql,',');
//	mysqli_query($conn,$finalQuery);
	if($conn->query($finalQuery) === TRUE){
			//echo "exams Feesposted";
			//header("Location:formfees.php?popup");
			//include('../logic/chargeformfees.php');
			?>
			<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Stream Fess Has Been Charged Succesfully<br><br><br>
										<a href="">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
			
			<?php
	}else{
		?>
			<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/error.png' style="width:100px;height:100px;"><br><br>
										Stream Fess Has NOT Been Charged <br><br><br>
										<a href="">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
			
			<?php
	}

					}
				?>
				
			</section>
		</section>
	</body>
</html>