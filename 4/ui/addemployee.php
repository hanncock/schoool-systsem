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
					<span id="closebtn" class="closebtn" style="font-size:20px;cursor:pointer;padding-left:30px;font-size:25px " onclick="closeNav()" >&times;</span>
					<span id="openbtn" style="font-size:20px;cursor:pointer;padding-left:30px;font-size:25px " onclick="openNav()">&#9776;</span>
				</div>
				<div class="display">
					<div class="cont">
						<center style="background:dodgerblue;"><h1 >Add Employee</h1></center>
						<form method="POST" action="#">
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
									<td class="labels">Name:</td>
									<td class="inputs"><input type="text" name="empname"></td>
									<td class="labels">D.O.B:</td>
									<td class="inputs"><input type="text" name="empdob"></td>
									<td class="labels">Gender:</td>
									<td class="inputs">
										<select>
											<option value="male" name="-">-</option>
											<option value="male" name="male">Male</option>
											<option value="male" name="female">Female</option>
										</select>
									</td>
									<td class="labels">National ID:</td>
									<td class="inputs"><input type="text" name="empnationalid"></td>
								</tr>
								<tr>
									<td class="labels">Conatct:</td>
									<td class="inputs"><input type="text" name="empcontact"></td>
									<td class="labels">Marital Status:</td>
									<td class="inputs">
										<select >
											<option value="" name="-">-</option>
											<option value="single" name="single">Single</option>
											<option value="married" name="married">Married</option>
										</select>
									</td>
									<td class="labels">Role:</td>
									<td class="inputs">
										<select >
											<option value="" name="-">-</option>
											<option value="teacher" name="teacher">Teacher</option>
											<option value="Management" name="management">Management</option>
											<option value="Management" name="management">Management</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="labels">Email:</td>
									<td class="inputs"><input type="text" name="empemail"></td>
									<td class="labels">Home Address:</td>
									<td class="inputs"><input type="text" name="emphome"></td>
								</tr>
							</table>
							<input type="submit" name="create" class="submit">
						</form>
					</div>	
				</div>
			</div>
		</div>
	</body>
</html>