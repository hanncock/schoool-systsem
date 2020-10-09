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
						<center style="background:green;color:white;"><h1 >Add Book</h1></center>
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
									<td class="labels">Category:</td>
									<td class="inputs"><input type="text" name="category"></td>
									<td class="labels">Title:</td>
									<td class="inputs"><input type="text" name="title"></td>
									<td class="labels">Subject:</td>
									<td class="inputs"><input type="text" name="subject"></td>
									<td class="labels">Reference No:</td>
									<td class="inputs"><input type="text" name="refernceno"></td>
								</tr>
								<tr>
									<td class="labels">Description:</td>
									<td class="inputs"><input type="text" name="description"></td>
									<td class="labels">Author:</td>
									<td class="inputs"><input type="text" name="author"></td>
									<td class="labels">Publisher:</td>
									<td class="inputs"><input type="map" name="publisher"></td>
									<td class="labels">No of copies:</td>
									<td class="inputs"><input type="text" name="copies"></td>
								
								</tr>
								<tr>
									<td class="labels">Price:</td>
									<td><input type="text" name="price"></td>
									<td class="labels">Location:</td>
									<td><input type="text" name="location"></td>
									<td class="labels">Rack No:</td>
									<td><input type="text" name="rackno"></td>
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