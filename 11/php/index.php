<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../js/main.js"></script>
		<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<!--link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'-->
		<!--script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script-->
	</head>
	<body onload="check()">
		<section id="menu" class="menu">
			<button class="btns" onclick="myFunction1()">
				<i class="fa fa-university" style="font-size:1.3rem"></i>
				<a href="#dashboard">Patient Management</a>
			</button><br>
			<button class="btns" onclick="myFunction3()">
				<i class="fa fa-university" style="font-size:1.3rem"></i>
				<a href="#registerpatient">Register Patient</a>
			</button><br>
			<button class="btns" onclick="myFunction2()">	
				<i class="fa fa-users" style="font-size:1.3rem"></i>
				<a href="#addstudent">Laboratory</a>
			</button><br>
			<button class="btns" onclick="myFunction1()">
				<i class="fa fa-university" style="font-size:1.2rem"></i>
				<a href="#dashboard">Accounts</a>
			</button><br>
			<a href="#addstudent"><button class="btns"  onclick="myFunction2()">Add Student</button></a><br>
		</section>
		<section class="maindisp">
			<section class="header">
				Application <b>.</b> <div id="headpage"></div>
				<input type="text" name="search" class="search" placeholder="Search...">
			</section>
			<iframe src="" id="frame" class="iframe" ></iframe>
		</section>
	</body>
</html>	