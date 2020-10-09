<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
  function validateForm (){
	  if(document.school.schlname.value==""){
		  alert("Please enter a School Name");
		  document.school.schlname.focus();
		  return false;
	  }
	   if(document.school.schladdress.value==""){
		  alert("Please enter a School Address");
		  document.school.schladdress.focus();
		  return false;
	  }
	   if(document.school.schlvat.value==""){
		  alert("Please enter a School V.A.T No");
		  document.school.schlvat.focus();
		  return false;
	  }
	   if(document.school.schlhealth.value==""){
		  alert("Please enter a School Health No");
		  document.school.schlhealth.focus();
		  return false;
	  }
	   if(document.school.schllocation.value==""){
		  alert("Please enter a School Location");
		  document.school.schllocation.focus();
		  return false;
	  }
	    if(document.school.schlpin.value==""){
		  alert("Please enter a School Pin");
		  document.school.schlpin.focus();
		  return false;
	  }
	    if(document.school.schllocation.value==""){
		  alert("Please enter a School Name");
		  document.school.schllocation.focus();
		  return false;
	  }
	    if(document.school.schlphone.value==""){
		  alert("Please enter a School Phone Number");
		  document.school.schlphone.focus();
		  return false;
	  }
	    if(document.school.schlemail.value==""){
		  alert("Please enter a School Email");
		  document.school.schlemail.focus();
		  return false;
	  }
	    if(document.school.schlwebsite.value==""){
		  alert("Please enter a School website");
		  document.school.schlwebsite.focus();
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
					<form action="../logic/school.php" class="addschl" name="school" onsubmit="return validateForm()" method="POST">
						<h2>Create School</h2>
						<table>
							<tr>
								<td class="label">School Name</td>
								<td class="inputs"><input type="text" name="schlname" ></td>
								<td class="label">School Location</td>
								<td class="inputs"><input type="text" name="schladdress"></td>
								<td class="label">School V.A.T</td>
								<td class="inputs"><input type="text" name="schlvat"></td>
								<td class="label" rowspan="3" style="position:absolute;">
									<!--img src="../images/avatar.png" style="width:200px;height:150px;top:100px;right:40px;"--><br>
									<input type="file" name="schlogo">
								</td>
							</tr>
							<tr>
								<td class="label">School HealthNo.</td>
								<td class="inputs"><input type="text" name="schlhealth"></td>
								<td class="label">School Location</td>
								<td class="inputs"><input type="text" name="schllocation"></td>
								<td class="label">School Pin</td>
								<td class="inputs"><input type="text" name="schlpin"></td>
								
								
							<tr>
							</tr>
								<td class="label">School Phone</td>
								<td class="inputs"><input type="text" name="schlphone"></td>
								<td class="label">School Email</td>
								<td class="inputs"><input type="text" name="schlemail"></td>
								<td class="label">School Website</td>
								<td class="inputs"><input type="text" name="schlwebsite"></td>
							</tr>
						</table>
							<center>
								<input type="submit" name="CreateSchool" value="CreateSchool" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
							</center>
					</form>
					<section class="schls">
						<h2>School List</h2>
						<table>
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
									<td>#</td>
									<td>School Name</td>
									<td>School Adress</td>
									<td>School V.A.T</td>
									<td>School Health</td>
									<td>School Email</td>
									<td>School Location</td>
									<td>School Pin</td>
									<td>School Email</td>
									<td>School Phone</td>
									<td></td>
							</tr>
								<?php include '../logic/school.php' ?>
						</table>
						
					</section>
					
				</section>
			</section>
		</section>
	</body>
</html>