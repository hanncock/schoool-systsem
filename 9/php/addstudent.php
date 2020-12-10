<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		  <script type="text/javascript">
  function validateForm ()
  {
    if(document.student.fname.value=="")
    {
    alert("please provide the student First Name");
      document.student.fname.focus();
      return false;
    }
	 if(document.student.sirname.value=="")
    {
    alert("please provide the student Second Name");
      document.student.sirname.focus();
      return false;
    }
	 if(document.student.tname.value=="")
    {
    alert("please provide the student Third Name");
      document.student.tname.focus();
      return false;
    }
	 if(document.student.dob.value=="")
    {
    alert("please provide the student Date of Birth");
      document.student.dob.focus();
      return false;
    }
	 if(document.student.gender.value=="")
    {
    alert("please provide the student Gender");
      document.student.gender.focus();
      return false;
    }
	 if(document.student.admno.value=="")
    {
    alert("please provide the student Admisiion No");
      document.student.admno.focus();
      return false;
    }
	 if(document.student.class.value=="")
    {
    alert("please provide the student Class");
      document.student.class.focus();
      return false;
    }
	 if(document.student.stream.value=="")
    {
    alert("please provide the student Stream");
      document.student.stream.focus();
      return false;
    }
	 if(document.student.county.value=="")
    {
    alert("please provide the student county ");
      document.student.county.focus();
      return false;
    }
	
	
    return true;
  }
    </script>
	</head>
	<body>
		<section class="container">
			<?php include 'header.php' ?>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<form action="../logic/student.php" name="student" onsubmit="return validateForm()" class="addschl" method="POST">
						<h2>Add Student</h2>
						<table>
							<tr>
								<td class="label">First Name:</td>
								<td class="inputs"><input type="text" name="fname" ></td>
								<td class="label">Sir Name</td>
								<td class="inputs"><input type="text" name="sirname"></td>
								<td class="label">Third Name</td>
								<td class="inputs"><input type="text" name="tname"></td>
								<td class="label" rowspan="3" style="position:absolute;">
									<img src="../images/avatar.png" style="width:200px;height:180px;top:100px;right:20px;"><br>
									<input type="file" name="studentphoto">
								</td>
							</tr>
							<tr>
								<td class="label">Other Name</td>
								<td class="inputs"><input type="text" name="oname"></td>
								<td class="label">D.O.B</td>
								<td class="inputs"><input type="date" name="dob"></td>
								<td class="label">Gender</td>
								<td class="inputs">
									<select name="gender">
										<option value="">--Sel Gender--</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</td>
								
								
							</tr>
							<tr>
								<td class="label">Admission No</td>
								<td class="inputs"><input type="text" name="admno"></td>
								<td class="label">Class</td>
								<td class="inputs">
									<select name="class">
										<option value="">--select class--</option>
											<?php
												require_once('../logic/connector.php');
												$sql = "select * from class";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['clsname']."'>".$row['clsname']."</option>";
													}
												}	
											?>
									</select>
								</td>
								<td class="label">Stream</td>
								<td class="inputs">
									<select name="stream">
										<option value="">-select Stream-</option>
											<?php
												require_once('../logic/connector.php');
												$sql = "select * from stream";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['strmname']."'>".$row['strmname']."</option>";
													}
												}	
											?>
									</select>
								</td>
							</tr>
							<tr>	
								<td class="label">Email</td>
								<td class="inputs"><input type="text" name="email"></td>
								<td class="label">Phone No</td>
								<td class="inputs"><input type="text" name="phone"></td>
								<td class="label">County</td>
								<td class="inputs">
									<select name="county">
										<option value="">--Sel County--</option>
										<option value="Kisii">Kisii</option>
										<option value="Nyamira">Nyamira</option>
									</select>
								</td>
							</tr>
						</table>
							<center>
								<input type="submit" name="AddStudent" value="Add Student" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
							</center>
					</form>
					<section class="schls">
						
								<?php include '../logic/student.php' ?>
					</section>
					<?php
						if(isset($_GET['popup'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Student Has Been Added Succesffully<br><br><br>
										<a href="addstudent.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
							<?php
						}
					?>
					<?php
						if(isset($_GET['error'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Error on Adding Student Admission N<sup>o</sup> Already Assigned<br><br><br>
										<a href="addstudent.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
							<?php
						}
					?>
				</section>
			</section>
		</section>
	</body>
</html>