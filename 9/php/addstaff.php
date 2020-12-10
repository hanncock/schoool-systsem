<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
			function validateForm(){
				if(document.staff.names.value==""){
					alert("Enter staff name");
					document.staff.names.focus();
					return false;
				}
				if(document.staff.idno.value==""){
					alert("Enter staff ID Number");
					document.staff.idno.focus();
					return false;
				}
				if(document.staff.gender.value==""){
					alert("Enter staff gender");
					document.staff.gender.focus();
					return false;
				}
				if(document.staff.marital.value==""){
					alert("Enter staff marital status");
					document.staff.names.focus();
					return false;
				}
				if(document.staff.dob.value==""){
					alert("Enter staff date of birth");
					document.staff.dob.focus();
					return false;
				}
				if(document.staff.names.value==""){
					alert("Enter staff name");
					document.staff.names.focus();
					return false;
				}
				if(document.staff.residence.value==""){
					alert("Enter staff residence");
					document.staff.residence.focus();
					return false;
				}
				if(document.staff.email.value==""){
					alert("Enter staff email");
					document.staff.email.focus();
					return false;
				}
				if(document.staff.phone.value==""){
					alert("Enter staff phone numbers");
					document.staff.phone.focus();
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
					<form name="staff" onsubmit="return validateForm()" enctype="multipart/form-data" method="POST" action="../logic/staff.php" class="addschl">
						<h2>Add Staff</h2>
						<table>
							<tr>
								<td class="label">Names:</td>
								<td class="inputs"><input type="text" name="names" ></td>
								<td class="label">ID_No.</td>
								<td class="inputs"><input type="text" name="idno"></td>
								<td class="label">Gender</td>
								<td class="inputs">
									<select name="gender">
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</td>
								<td><input type="file" name="files"></td>
							</tr>
							<tr>
								<td class="label">Marital Status</td>
								<td class="inputs">
									<select name="marital">
										<option value="">--Select Marital--</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Divorced">Divorced</option>
										<option value="Widowed">Widowed</option>
									</select>
								</td>
								<td class="label">D.O.B</td>
								<td class="inputs"><input type="date" name="dob"></td>
								<td class="label">residence</td>
								<td class="inputs"><input type="text" name="residence"></td>
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
								<input type="submit" name="AddStaff" value="Add Staff" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
							</center>
					</form>
					<section class="schls">
						<h2>Staff List</h2>
						<table style="width:100%;">
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:3rem;" >
									<td>#</td>
									<td>Photo</td>
									<td>Names</td>
									<td>ID_No</td>
									<td>Gender</td>
									<td>Marital</td>
									<td>Residence</td>
									<td>Email</td>
									<td>Phone</td>
									<td>dob</td>
									<td>created by</td>
								
									<td></td>
							</tr>
								<?php include '../logic/staff.php' ?>
						</table>
						
					</section>
					
				</section>
			</section>
		</section>
	</body>
</html>