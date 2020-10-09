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
				<h2><center style="font-family:cursive; font-size:1rem;">Schools</center></h2>
				<?php 
					require_once('../logic/connector.php');
					$sql ="select * from schl";
					$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo "<table class='disptable'>
		<tr ><b>
			<th class='dispth'>Name</th>
			<th class='dispth'>Address</th>
			<th class='dispth'>Logo</th>
			<th class='dispth'>V.A.T</th>
			<th class='dispth'>Min of Health</th>
			<th class='dispth'>Website</th>
			<th class='dispth'>Email</th>
			<th class='dispth'>Location</th>
			<th class='dispth'>Pin</th>
			<th class='dispth'>Phone No</th>
			<th ></th>
			<th ></th>
		</b> </tr>";		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr'>";
			echo "<td class='disptd'>" . $row['schlname'] . "</td>";
			echo "<td class='disptd'>" . $row['schladdress'] . "</td>";
			echo "<td class='disptd'>" . $row['logo'] . "</td>";
			echo "<td class='disptd'>" . $row['schlvat'] . "</td>";
			echo "<td class='disptd'>" . $row['schlhealth'] . "</td>";
			echo "<td class='disptd'>" . $row['website'] . "</td>";
			echo "<td class='disptd'>" . $row['email'] . "</td>";
			echo "<td class='disptd'>" . $row['schllocation'] . "</td>";
			echo "<td class='disptd'>" . $row['schlpin'] . "</td>";
			echo "<td class='disptd'>" . $row['schlphone'] . "</td>";
			echo "<td class='disptd'>" . "<i class='fa fa-edit' style='font-size:1.5rem;color:green;padding-left:5px;'></i>". "</td>";
			echo "<td class='disptd'>" . "<i class='fa fa-trash' style='font-size:1.5rem;color:red;padding-left:5px;'></i>" . "</td>";
		
		echo "</tr>";
	 }
	 echo "</table>";
	}
					
				?>
			</div>
		</div>
	</body>
</html>