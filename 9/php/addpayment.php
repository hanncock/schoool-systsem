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
							$admno =$_POST['admno'];
							$sql ="select admno,fname,sirname,tname,othername from student where admno=$admno;";
							$result = $conn->query($sql);
							$rec = $result->fetch_assoc();
							$admno = $rec['admno'];
							$name = $rec['fname']." ".$rec['sirname']." ".$rec['tname']." ".$rec['othername'];
							
							?>
					<form action="../logic/payment.php" method="POST">
						<h2>Add Payment</h2>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							<tr style="background:dodgerblue;color:white;">
								<td><input type="hidden" name="name" value='<?php echo $name; ?>'><span style="color:black;">Name:</span> <?php echo $name; ?></td>
								<td></td>
								<td><input type="hidden" name="admno" value='<?php echo $admno; ?>'><span style="color:black;">Admission N<sup>o</sup>:</span> <?php echo $admno; ?></td>
							</tr>
							<tr>
								<td class="inputs">
									<select name="mop">
										<option value="">--Select Payment--</option>
										<option value="CASH">Cash</option>
										<option value="M-PESA">M-Pesa</option>
										<option value="BANK RECEIPT">Bank Receipt</option>
										<option value="WAI1VER">waiver</option>
									</select>
								</td>	
								<td class="label">Ref No:</td>
								<td class="inputs"><input type="text" name="refno"></td>
								<td class="label">Amount:</td>
								<td class="inputs"><input type="text" name="amount"></td>
								<td><input type="submit" name="pay" value="PayFee" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>
							</tr>
						</table>
					</form>
						<?php
						}
						?>
					<section class="payment">
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
												
												<td>Name</td>
												<td>Package</td>
												<td>Amount</td>
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
													echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['name']. "</td>";
													echo "<td style='color:dodgerblue;'>". $row['package']. "</td>";
													echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['price']. "</td>";
													//echo $total;
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
						<div class="charged" style="overflow: auto;height:400px;">
							
								<?php
								if(isset($_POST['search'])){
									echo "<h2>Payment History</h2>";
									$sql ="select * from payment where admno=$admno order by id desc";
									$result=$conn->query($sql);
									if($result->num_rows>0){
										echo "<table style='width:100%'>
											<tr style='background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:3rem;' >
												<td>Name</td>
												<td>Admn N<sup>o</sup></td>
												<td>M.O.P</td>
												<td>Ref N<sup>o</sup></td>
												<td>Amount</td>
												<td></td>
											</tr>";
										while($row=$result->fetch_assoc()){
											echo "<tr style='height:2.5rem'>";
											$ref = $row['refno'];
											echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['name']."</td>";
											echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['admno']."</td>";
											echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['mop']."</td>";
											echo "<td class='labels' style=' border-bottom: 1px solid white;'>". $row['refno']."</td>";
											echo "<td style='color:white;color:blue;'>". $row['amount']. "</td>";
											?>
											<td>
												<button class="fa fa-print" style="background:green;color:white;" onclick="print('<?php echo $ref;?>')"></button>
											</td>
											<?php
											$sum = 0;
											$sum += $row['amount'];
											echo "</tr>";
										}
										echo "</table>";
									}
								}
							
							?>
						</div>
					</section>
				</section>
				<?php
						if(isset($_GET['popup'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Student Fees Has Been Paid Succesfully<br><br><br>
										<a href="addpayment.php">
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
	</body>
</html>