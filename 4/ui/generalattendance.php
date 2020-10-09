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
				<div class="cont">
					<center style="background:dodgerblue;"><h1 >General Student Attendance</h1></center>
					<form>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							<tr>
								<td class="labels"><center>From:</center></td>
								<td class="inputs"><input type="date" name="from"></td>
								<td class="labels"><center>To:</center></td>
								<td class="inputs"><input type="date" name="to"></td>
								<td class="labels"><center>Class:</center></td>
								<td class="inputs"><input type="date" name="from"></td>
								<td class="labels"><center>Stream:</center></td>
								<td class="inputs"><input type="date" name="to"></td>
							</tr>
						</table>
						<span style="float:right">total:123456789</span>
					</form>
				</div>
				student list goes here<br>
			</div>
		</div>
	</body>
</html>