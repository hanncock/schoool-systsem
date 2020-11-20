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
					<form method="POST" action="">
						<input type="text" name="admno" value="" placeholder="admission no" required>
						<input type="submit" name="search" value="Search" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
					</form><br>						
					<h2>Student List</h2>
					<?php include('../logic/payment.php') ?>
					<form action="" method="POST">
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
							<tr>
								<td><input type="hidden" name="name" value='<?php echo $name; ?>'>Name:<?php echo $name; ?></td>
								<td></td>
								<td><input type="hidden" name="admno" value='<?php echo $admno; ?>'>Admission No:<?php echo $admno; ?></td>
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
				</section>
			</section>
		</section>
	</body>
</html>