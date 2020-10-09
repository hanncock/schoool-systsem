<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script type="text/javascript">
  function validateForm ()
  {
    if(document.fees.pckgname.value=="")
    {
    alert("please provide your packageName");
      document.fees.pckgname.focus();
      return false;
    }
	  if(document.fees.clsname.value=="")
    {
    alert("please provide your ClassName");
      document.fees.clsname.focus();
      return false;
    }
	  if(document.fees.amnt.value=="")
    {
    alert("please provide your amnt");
      document.fees.amnt.focus();
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
					<form action="../logic/feespackage.php" class="addschl" name="fees" onsubmit="return validateForm()" method="POST">
						<h2>Create Fees Packages</h2>
						<table>
							<tr>
								<td class="label">Package Name</td>
								<td class="inputs"><input type="text" name="pckgname" ></td>
								<td class="label">Class</td>
								<td class="inputs">
									<select name="clsname">
										<option value="">--select class--</option>
										<option value="All">All</option>
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
								<td class="label">Charge</td>
								<td class="inputs"><input type="int" name="amnt"></td>
							</tr>
						</table>
							<center>
								<input type="submit" name="CreatePackage" value="Create Package" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
							</center>
					</form>
					<section class="schls">
						<h2>School Packages</h2>
						<table>
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
									<td>#</td>
									<td>Package Name</td>
									<td>Applies to</td>
									<td>Amount charged</td>
									<td>Date</td>
									<td>Time</td>
									<td></td>
							</tr>
								<?php include '../logic/feespackage.php' ?>
						</table>
						
					</section>
					
				</section>
			</section>
		</section>
	</body>
</html>