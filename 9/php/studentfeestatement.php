<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
			function print(ref){
				//var a=document.getElementById('ref').value;
				var a= ref;
				console.log(a);
				//console.log(ref);
				window.open("../print/schoolfeesreceipt.php?ref=" + a, true);
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
			<section class="display" style="font-size:0.9rem;">
				<?php include 'menu.php'?>
				<section class="disp">
					<h2>Student Payment History</h2>
					<form method="POST" action="">
						<input type="text" name="admno" value="" placeholder="admission no" required>
						<input type="submit" name="search" value="Search" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
					</form>	
					<?php
						if(isset($_POST['search'])){
							require("../logic/connector.php");
							require_once('../php/session.php');
							$admno =$_POST['admno'];
							$sql ="select admno,fname,sirname,tname,othername from student where admno=$admno;";
							$result = $conn->query($sql);
							$rec = $result->fetch_assoc();
							$admno = $rec['admno'];
							$name = $rec['fname']." ".$rec['sirname']." ".$rec['tname']." ".$rec['othername'];
							
							?>
						<?php
						}
						?>
					
						<div class="paid">
							
							<?php
								require('../logic/connector.php');
								if(isset($_POST['search'])){
									echo "<h2>Charged Packages</h2>";
									$admno = $_POST['admno'];
									$sql = "SELECT * FROM studentfees where admno=$admno";
									$result = $conn->query($sql);
									if($result->num_rows > 0){
										echo "<table style='width:100%;'>
											<tr style='background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:3rem;' >
												
												<td>Date Charged</td>
												<td>Adm_No:</td>
												<td>Name</td>
												<td>Class</td>
												<td>Package</td>
												<td>Amount</td>
												<td>User</td>
												<td>Action</td>
											</tr>";
											$sql1 = "SELECT SUM(price) AS count FROM studentfees where admno=$admno";
											$res = $conn->query($sql1);
											$rec = $res->fetch_assoc();
											$total = $rec['count'];
		
											$sql1 = "SELECT SUM(amount) AS count FROM payment where admno=$admno";
											$res = $conn->query($sql1);
											$rec = $res->fetch_assoc();
											$paid = $rec['count'];

											while($row = $result ->fetch_assoc()){
												echo "<tr style='height:2.5rem;'>";
													
													$name =$row['name'];
													$admno =$row['admno'];
													echo "<td class='labels' style=' border-bottom: 1px solid white;text-align:center;'>". $row['created_on']. "</td>";
													echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['admno']. "</td>";
													echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['name']. "</td>";
													echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['class']. "</td>";
													echo "<td style='color:dodgerblue;'>". $row['package']. "</td>";
													echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['price']. "</td>";
													echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['user']. "</td>";
													?>
													<td>
														<a href="studentfeestatement.php?reverse=<?php echo $row['id']?>"><button>Reverse</button></a>
													</td>
													<?php
												echo "</tr>";
											}
											
										echo "</table>";
									}
									$balance = $total-$paid;
									echo"<table style='width:100%'><tr style='height:3rem;'>";
										echo "<td style='background:green;box-shadow:2px 4px 5px green;'>Total Year Fees:"."<span style='color:white';>".$total."</span></td>";
										echo "<td></td>";
										echo "<td style='background:green;box-shadow:2px 4px 5px green;'>Paid term Fees:"."<span style='color:white';>".$paid."</span></td>";
										echo "<td></td>";
										echo "<td style='background:red;box-shadow:2px 4px 5px green;'>Fee Balance:"."<span style='color:white';>".$balance."</span></td>";
									echo "</table>";
								}
							
							?>
						</div>
					
				</section>
			</section>
			<?php
				if(isset($_GET['reverse'])){
					$id =$_GET['reverse'];
					$sql = "select * from studentfees where id=$id";
					//echo $sql;
					$resu = $conn->query($sql);
					$row = $resu->fetch_assoc();
					?>
					 <section class="edit">
						<section class="editinfo">
							<form method="POST" action=""class="addschl">
									<h2>Reverse Student Charged Fee</h2>
									<table>
										<tr style="height:50px;">	
											<td class="label">
												<span>Name:</span>
												<input type="hidden"  name="name" value="<?php echo $row['name']; ?>">
												<span style="color:blue;"><?php echo $row['name'];?>
											</td>
											<td class="label">
												<span>Admisson:</span>
												<input type="hidden"  name="admno" value="<?php echo $row['admno']; ?>">
												<span style="color:blue;"><?php echo $row['admno'];?>
											</td>
										</tr>
										<tr style="height:50px;">	
											<td class="label">
												<span>Package:</span>
												<input type="hidden"  name="package" value="<?php echo $row['package']; ?>">
												<span style="color:blue;"><?php echo $row['package'];?>
											</td>
											<td class="label">
												<span>Price:</span>
												<input type="hidden"  name="price" value="<?php echo $row['price']; ?>">
												<span style="color:blue;"><?php echo $row['price'];?>
											</td>
											<td class="label">
												<span>Date Charged:</span>
												<input type="hidden"  name="date_charged" value="<?php echo $row['created_on']; ?>">
												<span style="color:blue;"><?php echo $row['created_on'];?>
											</td>
										</tr>
										<tr style="height:50px;">
											<td class="label">
												<span>Reason:</span><br>
												<textarea  name="reason" rows="4" column="100" required></textarea>
												
											</td>
										</tr>
									</table><br>
									<center>
										<button  class="save" type="submit" name="save" value="<?php echo $row['id']; ?>">Save</button>
										<button class="close"><a href="studentfeestatement.php">Cancel</a></button>								
									</center>
							</form>
						</section>		
					</section>
					<?php
				}
				if(isset($_POST['save'])){
					
					$id = $_POST['save'];
					//echo $id;
					$name = $_POST['name'];
					$admno = $_POST['admno'];
					$package = $_POST['package'];
					$price = $_POST['price'];
					$reason = $_POST['reason'];
					$date_charged = $_POST['date_charged'];
					$user = $_SESSION["username"]; 
					
					$sql = "insert into reversedfees(admno,name,package,price,reason,date_charged,user)
									VALUES
							('$admno','$name','$package','$price','$reason','$date_charged','$user')";
					//echo $sql;
			
					if($conn->query($sql) === TRUE){
							$sql = "delete from studentfees where id=$id";
							if($conn->query($sql) === TRUE){
								?>
								<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Student Fees Has Been Reversed Succesfully<br><br><br>
										<a href="studentfeestatement.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
								<?php
							}else{
								echo "error on reversing";
							}
					}else{
						echo "cant reverse student fee;";
					}
			}
			?>
		</section>
	</body>
</html>