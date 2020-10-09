<DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link rel="stylesheet" type="text/css" href="../css/school.css">
		<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
		
	</head>
	<body onload="">
		<div class="wrapper">
		
			<div class="menu" id="menu">
				<div class="tab" id="tab">
				
					<button class="tablinks" onclick="openCity(event, 'London')">
						<i class="fa fa-tachometer" id="icons"></i>
						<label class="labels" id="labels">Dashboard</label>
					</button><br>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-university" id="icons"></i>
							<label class="dropdown-btn" id="labels">School Setup<i class="fa fa-caret-down"></i></label>
							
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'Paris')"> 
								<label class="labels2" id="labels2">Create School</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'EditSchool')"> 
								<label class="labels2" id="labels2">Edit School</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-user" id="icons"></i>
							<label class="dropdown-btn" id="labels">Student Setup</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'AddStudent')"> 
								<label class="labels2" id="labels2">Add Student</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Editstudent')"> 
								<label class="labels2" id="labels2">Modify Student</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Activate')"> 
								<label class="labels2" id="labels2">Activate</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'De-Activate')"> 
								<label class="labels2" id="labels2">De-Activate</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Sign In')"> 
								<label class="labels2" id="labels2">Sign In</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Sign Out')"> 
								<label class="labels2" id="labels2">Sign Out</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Diary')"> 
								<label class="labels2" id="labels2">Student Diary</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-university" id="icons"></i>
							<label class="dropdown-btn" id="labels">Class Setup</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'CreateClass')"> 
								<label class="labels2" id="labels2">Create Class</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Streams')"> 
								<label class="labels2" id="labels2">Create Streams</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Streams')"> 
								<label class="labels2" id="labels2">Create Subjects</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-user" id="icons"></i>
							<label class="dropdown-btn" id="labels">Exams</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'AddExam')"> 
								<label class="labels2" id="labels2">Create Exams</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Editstudent')"> 
								<label class="labels2" id="labels2">Marking Scheme</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Activate')"> 
								<label class="labels2" id="labels2">Grading System</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'De-Activate')"> 
								<label class="labels2" id="labels2">Student Results</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Sign In')"> 
								<label class="labels2" id="labels2">Process Exam Results</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-users" id="icons"></i>
							<label class="dropdown-btn" id="labels">Users</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'Add User')"> 
								<label class="labels2" id="labels2">Add User</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Userroles')"> 
								<label class="labels2" id="labels2">User Roles</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-book" id="icons"></i>
							<label class="dropdown-btn" id="labels">Library</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'Issue Book')"> 
								<label class="labels2" id="labels2">Issue Book</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Register Book')"> 
								<label class="labels2" id="labels2">Register Book</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Book Category')"> 
								<label class="labels2" id="labels2">Book Category</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-users" id="icons"></i>
							<label class="dropdown-btn" id="labels">Inventory & Supplies</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'Issue Book')"> 
								<label class="labels2" id="labels2">Uniforms</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Register Book')"> 
								<label class="labels2" id="labels2">Stationary</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Book Category')"> 
								<label class="labels2" id="labels2">Cleaning Equipment</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-usd" id="icons"></i>
							<label class="dropdown-btn" id="labels">Accounts</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'Paris')"> 
								<label class="labels2" id="labels2">Create School</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'EditSchool')"> 
								<label class="labels2" id="labels2">Edit School</label>
							</button><br>
						</div>
					</div>
					
					<div class="dropdown">
						<button class="dropdown-btn">
							<i class="fa fa-university" id="icons"></i>
							<label class="dropdown-btn" id="labels">E-Learning</label>
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<button class="tablinks" onclick="openCity(event, 'GiveAssignment')"> 
								<label class="labels2" id="labels2">Give Assignment</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'EditSchool')"> 
								<label class="labels2" id="labels2">Edit School</label>
							</button><br>
						</div>
					</div>
					
					<!--div class="dropdown">
						<button class="tablinks" onclick="myDrop3()">
							<i class="fa fa-book" id="icons"></i>
							<label class="labels" id="labels">Library</label>
							<i class="fa fa-caret-down"></i>
						</button><br>
						<div class="dropdown-content" id="content1">
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								<label class="labels2" id="labels2">Issue Book</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								<label class="labels2" id="labels2">Register Book</label>
							</button><br>
							<button class="tablinks" onclick="openCity(event, 'Paris')">
								<label class="labels2" id="labels2">Book Category</label>
							</button><br>
						</div>
					</div-->
					</ul>
				</div>
				<div class="tab2" id="tab2">
					<button class="tablinks" onclick="openCity(event, 'London')">
						<i class="fa fa-tachometer" id="icons"></i>
					</button><br>
				
					<button class="tablinks">
						<i class="fa fa-university" id="icons"></i>
					</button>
				
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
				
				<div id="EditSchool" class="tabcontent">
					<?php include('../logic/edit school.php') ?> 
				</div>
				
				<div id="AddStudent" class="tabcontent">
					<?php include('addstudent.php') ?> 
				</div>
				
				<div id="Editstudent" class="tabcontent">
					<?php include('../logic/editstudent.php') ?> 
				</div>
				
				<div id="Activate" class="tabcontent">
					<?php include('../logic/editstudent.php') ?> 
				</div>
				
				<div id="De-Activate" class="tabcontent">
					<?php include('../logic/editstudent.php') ?> 
				</div>
				
				<div id="Sign In" class="tabcontent">
					<?php include('../logic/editstudent.php') ?> 
				</div>

				<div id="Sign Out" class="tabcontent">
					<?php include('../logic/editstudent.php') ?> 
				</div>
				
				<div id="Diary" class="tabcontent">
					<?php include('../logic/editstudent.php') ?> 
				</div>
				
				<div id="Add User" class="tabcontent">
					<?php include('../logic/adduser.php') ?> 
				</div>
				
				<div id="Userroles" class="tabcontent">
					<?php include('../logic/adduser.php') ?> 
				</div>
				
				<div id="Issue Book" class="tabcontent">
					<?php include('../logic/issuebook.php') ?>
				</div>
				
				<div id="Register Book" class="tabcontent">
					<?php include('../logic/registerbook.php') ?>
				</div>
				
				<div id="Book Category" class="tabcontent">
					<?php include('add.php') ?>
				</div>
				
				<div id="CreateClass" class="tabcontent">
					<?php include('../logic/createclass.php') ?>
				</div>
				
				<div id="Streams" class="tabcontent">
					<?php include('streams.php') ?>
				</div>
				
				<div id="AddExam" class="tabcontent">
					<?php include('../logic/addexam.php') ?>
				</div>
				
				<div id="GiveAssignment" class="tabcontent">
					<?php include('../logic/elearn.php') ?>
				</div>
				
			</div>
		</div>		
	</body>
	<script src="../javascript/school.js"></script>
</html>