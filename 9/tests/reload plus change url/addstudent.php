<style>
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<script >
	function check(){
		if (window.performance) {
		  console.info("window.performance works fine on this browser");
		}
		console.info(performance.navigation.type);
		//document.getElementById("index").style.display="none";
		if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
			document.getElementById("data").style.display="none";
			document.getElementById("frame").src = "addstudent.php";
			document.getElementById("index").style.display="block";
			
			
		  console.info( "This page is reloaded" );
		} else {
			document.getElementById("index").style.display="none";
			document.getElementById("data").style.display="block";
		  console.info( "This page is not reloaded");
		}
		//document.getElementById("menu").style.display="none";
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
	$(window).load(function() {
		$(".se-pre-con").fadeOut();;
	});
</script>	
<body onload="check()">
<div class="se-pre-con"> <div class="loader"></div></div>
<div id="index">
	<?php include('index.php')?>
</div>
<div id="data">
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
</div>
</body>