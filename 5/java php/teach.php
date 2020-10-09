<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<script src="index.js"></script>
	</head>
	<body onload="openNav()">
		<div class="wrapper">
			<div class="head">
				<?php include('menu.php'); ?>
			</div>	
			<div class="disp">
				<div class="heading">
					<span id="closebtn" class="closebtn" style="font-size:20px;cursor:pointer;padding-left:30px;font-size:25px; " onclick="closeNav()" >&times;</span>
					<span id="openbtn" style="font-size:20px;cursor:pointer;padding-left:30px;font-size:25px; " onclick="openNav()">&#9776;</span>
				</div>
				<div class="display">
					<div class="cont">
						<center style="background:green;color:white;"><h1 >Add School</h1></center>
						<form method="POST" action="../logic/insert school.php">
							<table class="table">
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<td class="labels">School Name:</td>
									<td class="inputs"><input type="text" name="schlname"></td>
									<td class="labels">School Address:</td>
									<td class="inputs"><input type="text" name="schladdress"></td>
									<td class="labels">Logo</td>
									<td rowspan="2" class="inputs"><img src="img_avatar.png" style="height:60px;width:60px;" name="schllogo"></td>
								</tr>
								<tr>
									<td class="labels">V.A.T No:</td>
									<td class="inputs"><input type="text" name="schlvat"></td>
									<td class="labels">Min of Health No:</td>
									<td class="inputs"><input type="text" name="schlhealth"></td>
								
								</tr>
								<tr>
									<td class="labels">Website</td>
									<td class="inputs"><input type="text" name="schlwebsite"></td>
									<td class="labels">Email:</td>
									<td class="inputs"><input type="text" name="schlemail"></td>
									<td class="labels">Google Location:</td>
									<td class="inputs"><input type="map" name="schllocation"></td>
								</tr>
								<tr>
									<td class="labels">Pin:</td>
									<td><input type="text" name="schlpin"></td>
									<td class="labels">Phone No:</td>
									<td><input type="text" name="schlphone"></td>
								</tr>
							</table>
							<input type="submit" name="create" value="Create School" class="submit">
						</form>
					</div>	
				</div>
			</div>
		</div>
	</body>
</html>