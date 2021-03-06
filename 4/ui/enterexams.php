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
						<center style="background:dodgerblue;"><h1 >Enter Exams</h1></center>
						<form method="POST" action="#">
							<table class="table">
								<tr>
									<th style="width:20px;"></th>
									<th style="width:20px;"></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<td class="labels">Name:</td>
									
									<td class="labels">class:</td>
									
									<td class="labels">Stream:</td>
									
									<td class="labels">Subject:</td>
									
									<td class="labels">Teacher:</td>
									
								</tr>
								<tr>
									<td class="inputs"><input type="text" name="examname"></td>
									<td class="inputs"><input type="text" name="class"></td>
									<td class="inputs"><input type="text" name="stream"></td>
									<td class="inputs"><input type="text" name="subject"></td>
									<td class="inputs"><input type="text" name="teacher"></td>
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