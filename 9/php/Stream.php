<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</head>
	<body>
		<section class="container">
			<?php include 'header.php' ?>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<form method="POST" action="../logic/stream.php" class="addschl">
						<h2>Create Stream</h2>
						<table>
							<tr>
								<td class="label">Stream Code:</td>
								<td class="inputs"><input type="text" name="strmcode" ></td>
								<td class="label">Stream Name:</td>
								<td class="inputs"><input type="text" name="strmname" ></td>
								<td class="label">Teacher in Charge:</td>
								<td class="inputs">
									<select name="teacherchrg">
										<option value="">-select Teacher-</option>
											<?php
												require_once('../logic/connector.php');
												$sql = "select * from staff";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['names']."'>".$row['names']."</option>";
													}
												}	
											?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="label">No. Students:</td>
								<td class="inputs"><input type="int" name="numstudents" ></td>
							</tr>
						</table>
							<center>
								<input type="submit" name="CreateStream" value="Create Stream" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
							</center>
					</form>
					<section class="schls">
						<h2>Stream List</h2>
						<table>
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
									<td>#</td>
									<td>stream Code</td>
									<td>Stream Name</td>
									<td>Stream</td>
									<td>Teacher in Charge</td>
									<td>No. Students</td>
									<td></td>
							</tr>
								<?php include '../logic/stream.php' ?>
						</table>
						
					</section>
					
				</section>
			</section>
		</section>
	</body>
</html>