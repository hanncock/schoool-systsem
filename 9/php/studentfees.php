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
					<form method="POST" action="studentfees.php">
						<table>
							<tr>
								<td class="label">Admission</td>
								<td class="inputs"><input type="text" name="admno"></td>
								<td class="label">Class</td>
								<td class="inputs">
									<select name="streams">
										<option value="">-select Class-</option>
											<?php
												require_once('../logic/connector.php');
												$sql = "select * from stream";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['class']."'>".$row['strmname']."</option>";
													}
												}	
											?>
									</select>
								</td>
								<td class="label">Stream</td>
								<td class="inputs">
									<select name="streams">
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
							</tr>
						</table>
						<center>
								<input type="submit" name="search" value="Search" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
						</center>
					</form>
					<section class="schls">
						
						<table>
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
									<td>#</td>
									<td>Admisson No</td>
									<td>Names</td>
									<td>Class</td>
									<td>Stream</td>
									<td>Charged Amount</td>
									<td>Paid</td>
									<td></td>
							</tr>
								<?php include '../logic/feesstmt.php' ?>
						
						<?php
							require_once('../logic/connector.php');
							if(isset($_POST['search'])){
								$admno = $_POST['admno'];
								$sql = "SELECT fname,sirname,tname,othername,admno,class,stream FROM student where  admno=$admno";
								$result=$conn->query($sql);
								if ($result->num_rows > 0) {	
									// output data of each row
									while($row = $result->fetch_assoc()) {
										echo "<tr>";
										echo "<td></td>";
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
								include ('../logic/assignfeetostudent.php');
								
							}	
						?>
				</section>
			</section>
		</section>
	</body>
</html>