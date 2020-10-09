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
				<div class="display" id="display">
					<center><h1 style="background:green;color:white;">Add Student</h1></center>
					<center><div class="student_details">
							<button class="tablinks" onclick="disp(event, 'Student')">Student Information</button>					
							<button class="tablinks" onclick="disp(event, 'Parent')">Parent/Guardian Details</button>
							<button class="tablinks" onclick="disp(event, 'Home')">Home Details</button>
							<button class="tablinks" onclick="disp(event, 'Health')">Health Information</button>					
							<button class="tablinks" onclick="disp(event, 'School')">School Items</button>
							<button class="tablinks" onclick="disp(event, 'Documents')">Documents</button>
					</div></center>
					<div id="Student" class="tabcontent">
						<form method="POST" action="#" class="studentinfo" id="studentinfo">
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
									<td class="labels">First Name:</td>
									<td class="inputs"><input type="text" name="fname"></td>
									<td class="labels">Second Name:</td>
									<td class="inputs"><input type="text" name="sname"></td>
									<td class="labels">Third Name:</td>
									<td class="inputs"><input type="text" name="tname"></td>
								</tr>
								<tr>
									<td class="labels">D.O.B :</td>
									<td class="inputs"><input type="text" name="dob"></td>
									<td class="labels">Gender:</td>
									<td class="inputs"><input type="text" name="gender"></td>
									<td class="labels">Admission No:</td>
									<td class="inputs"><input type="text" name="adm_no"></td>
								</tr>
								<tr>
									<td class="labels">Class</td>
									<td class="inputs"><input type="text" name="class"></td>
									<td class="labels">Stream:</td>
									<td class="inputs"><input type="text" name="stream"></td>
									<td class="labels">Email:</td>
									<td class="inputs"><input type="map" name="email"></td>
								</tr>
								<tr>
									<td class="labels">Phone</td>
									<td><input type="text" name="phone"></td>
								</tr>
							</table>
						</form>
						<input type="submit" name="create" class="submit">
					</div>
					<div id="Parent" class="tabcontent">
						<form method="POST" action="#" id="parentinfo" class="parentinfo">
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
									<td class="labels">Parent Names:</td>
									<td class="inputs"><input type="text" name="parent1name"></td>
									<td class="labels">Phone No:</td>
									<td class="inputs"><input type="text" name="parent1phone"></td>
									<td class="labels">Email</td>
									<td class="inputs"><input type="text" name="parent1email"></td>
								</tr>
								<tr>
									<td class="labels">Parent Names:</td>
									<td class="inputs"><input type="text" name="parent2name"></td>
									<td class="labels">Phone No:</td>
									<td class="inputs"><input type="text" name="parent2phone"></td>
									<td class="labels">Email:</td>
									<td class="inputs"><input type="text" name="parent2email"></td>
								</tr>
								<tr>
									<td class="labels">Guardian Names:</td>
									<td class="inputs"><input type="text" name="guardianname"></td>
									<td class="labels">Stream:</td>
									<td class="inputs"><input type="text" name="guardianphone"></td>
									<td class="labels">Email:</td>
									<td class="inputs"><input type="map" name="guardianemail"></td>
								</tr>
							</table>
						</form>
						<input type="submit" name="create" class="submit">
					</div>
					<div id="Home" class="tabcontent">
						<form method="POST" action="#" id="parentinfo" class="parentinfo">
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
									<td class="labels">Home Address</td>
									<td class="inputs"><input type="text" name="address"></td>
									<td class="labels">Location:</td>
									<td class="inputs"><input type="text" name="location"></td>
									<td class="labels">Description</td>
									<td class="inputs"><input type="text" name="description"></td>
								</tr>
								<tr>
									<td class="labels">Google Address:</td>
									<td class="inputs"><input type="text" name="address"></td>
								</tr>
							</table>
						</form>
						<input type="submit" name="create" class="submit">
					</div>
					<div id="Health" class="tabcontent">
						<form method="POST" action="#" id="parentinfo" class="parentinfo">
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
									<td class="labels">Health Provider</td>
									<td class="inputs"><input type="text" name="health"></td>
									<td class="labels">Contact:</td>
									<td class="inputs"><input type="text" name="contact"></td>
									<td class="labels">Contact Person:</td>
									<td class="inputs"><input type="text" name="person"></td>
								</tr>
								<tr>
									<td class="labels">Allergies/Risks:</td>
									<td class="inputs"><input type="text" name="allergies"></td>
									<td class="labels">Medical Contidition:</td>
									<td class="inputs"><input type="text" name="condition"></td>
									<td class="labels">Medical Info:</td>
									<td class="inputs"><input type="text" name="medinfo"></td>
								</tr>
							</table>
						</form>
						<input type="submit" name="create" class="submit">
					</div>
					<div id="School" class="tabcontent">
						<form method="POST" action="#" id="parentinfo" class="parentinfo">
							<table class="table">
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
									<td class="labels">Item</td>
									<td class="inputs"><input type="text" name="item"></td>
									<td class="labels">From:</td>
									<td class="inputs"><input type="text" name="from"></td>
									<td class="labels">To:</td>
									<td class="inputs"><input type="text" name="to"></td>
									<td class="labels">Condition:</td>
									<td class="inputs"><input type="text" name="condition"></td>
								</tr>
								<tr>
									<td class="labels">Item</td>
									<td class="inputs"><input type="text" name="ritem"></td>
									<td class="labels">Date:</td>
									<td class="inputs"><input type="text" name="date"></td>
									<td class="labels">Condition:</td>
									<td class="inputs"><input type="text" name="rcondition"></td>
								</tr>
							</table>
						</form>
						<input type="submit" name="create" class="submit">
					</div>
					<div id="Documents" class="tabcontent">
						<form method="POST" action="#" id="parentinfo" class="parentinfo">
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
									<td class="labels">Document Name:</td>
									<td class="inputs"><input type="text" name="docname"></td>
									<td class="labels">Description:</td>
									<td class="inputs"><input type="text" name="desc"></td>
									<td class="labels">Document:</td>
									<td class="inputs"><input type="file" name="file"></td>
								</tr>
							</table>
						</form>
						<input type="submit" name="create" class="submit">
					</div>
					<div class="stdlist">
						student list
					</div>
				</div>
			</div>
		</div>
	</body>
</html>