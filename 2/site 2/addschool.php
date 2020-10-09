<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" type="text/css" href="addstudent.css">
		<script src="index.js"></script>
		<title>School Site</title>
	</head>
	<body onload="closeNav()">
		<div class="container-all">
			<div ><?php include('head.php'); ?></div>
			<div class="maindisplay">
				<div><?php include('menu.php'); ?></div>
				<div class="display" id="display">
					<form method="POST" action="#">
						<table class="table">
							<center><h1>Add School</h1></center>
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
								<td class="inputs"><input type="text" name="schoolname"></td>
								<td class="labels">School Address:</td>
								<td class="inputs"><input type="text" name="schooladdress"></td>
								<td class="labels">Logo</td>
								<td rowspan="2" class="inputs"><img src="img_avatar.png" style="height:60px;width:60px;" name="schoollogo"></td>
							</tr>
							<tr>
								<td class="labels">V.A.T No:</td>
								<td class="inputs"><input type="text" name="vatno"></td>
								<td class="labels">Min of Health No:</td>
								<td class="inputs"><input type="text" name="minofhealthno"></td>
								
							</tr>
							<tr>
								<td class="labels">Website</td>
								<td class="inputs"><input type="text" name="website"></td>
								<td class="labels">Email:</td>
								<td class="inputs"><input type="text" name="email"></td>
								<td class="labels">Google Location:</td>
								<td class="inputs"><input type="map" name="location"></td>
							</tr>
							<tr>
								<td class="labels">Pin:</td>
								<td><input type="text" name="pin"></td>
								<td class="labels">Phone No:</td>
								<td><input type="text" name="schlphone"></td>
							</tr>
						</table>
						<input type="submit" name="create" class="submit">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
