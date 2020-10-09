<DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<script src="school.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<div class="menu" id="menu">
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'London')">
						<i class="fa fa-tachometer" id="icons"></i>
						<label class="labels" id="labels">Dashboard</label>
					</button><br>
					
					<div class="dropdown">
						<button class="tablinks" onclick="myDrop1()">
							<i class="fa fa-university" id="icons"></i>
							<label class="labels" id="labels">School Setup</label>
							<i class="fa fa-caret-down"></i>
						</button><br>
						<div class="dropdown-content" id="content">
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Create School</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Edit School</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="tablinks" onclick="myDrop2()">
						<i class="fa fa-user" id="icons"></i>
						<label class="labels" id="labels">Student Setup</label>
						<i class="fa fa-caret-down"></i>
					</button><br>
						<div class="dropdown-content" id="contents">
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Add Student</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Modfy Student</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Activate</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">De-Activate</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Sign In</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Sign out</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								 
								<label class="labels2">Student Diary</label>
							</button><br>
						</div>
					</div>
					
					<button class="tablinks" >
						<i class="fa fa-users" id="icons"></i>
						<label class="labels" id="labels">Users</label>
					</button><br>
					
					<div class="dropdown">
						<button class="tablinks" onclick="myDrop3()">
							<i class="fa fa-book" id="icons"></i>
							<label class="labels" id="labels">Library</label>
							<i class="fa fa-caret-down"></i>
						</button><br>
						<div class="dropdown-content" id="content1">
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								<label class="labels2">Issue Book</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								<label class="labels2">Register Book</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								<label class="labels2">Book Category</label>
							</button><br>
						</div>
					</div>
					
				</div>
			</div>
			<div class="display">
				
				<div class="heading">
					<span id="closebtn" class="navcons" onclick="closeNav()" >&times;</span>
					<span id="openbtn"  class="navcons" onclick="openNav()">&#9776;</span>
				</div>
				
				<div id="London" class="tabcontent">
					<?php include('dashboard.php') ?>
				</div>

				<div id="Paris" class="tabcontent">
					<?php include('school.php') ?> 
				</div>

				<div id="Tokyo" class="tabcontent">
					<?php include('add.php') ?>
				</div>
			</div>
		</div>		
	</body>
</html>