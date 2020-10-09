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
					<form method="POST" action="../logic/class.php" class="addschl">
						<h2>Create Class</h2>
						<table>
							<tr>
								<td class="label">Class Code:</td>
								<td class="inputs"><input type="text" name="clscode" ></td>
								<td class="label">Class Name:</td>
								<td class="inputs"><input type="text" name="clsname" ></td>
								<td class="label">Stream</td>
								<td class="inputs"><select name="streams">
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
								<td class="label">Teacher:</td>
								<td class="inputs">
									<select name="teacher">
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
								<input type="submit" name="CreateClass" value="Create Class" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
							</center>
					</form>
					<section class="schls">
						<h2>Class List</h2>
						<table>
							<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
									<td>#</td>
									<td>Class Code</td>
									<td>Class Name</td>
									<td>Stream</td>
									<td>Class Teacher</td>
									<td>No. Students</td>
									<td></td>
							</tr>
								<?php include '../logic/class.php' ?>
						</table>
						
					</section>
					
				</section>
			</section>
		</section>
	</body>
</html>