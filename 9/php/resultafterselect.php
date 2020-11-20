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
					<form method="POST" action=""> 
						<td class="label">Exam Name</td>
						<td class="inputs">
							<select name="examname">
								<option value="">--Select Exam--</option>
									<?php
										require_once('../logic/connector.php');
										$sql = "select * from exam";
										$result=$conn->query($sql);
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<option value='".$row['examname']."'>".$row['examname']."</option>";
											}
										}	
									?>
							</select>
						</td>
						<td class="label">Exam Name</td>
						<td class="inputs">
							<select name="stream">
								<option value="">--Select Stream--</option>
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
						<td><input type="submit" name="query" value="Query" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>	
					</form>
					<?php
						require_once('../logic/connector.php');
						if(isset($_POST['query'])){
							//$class = $_POST['class'];
							$examname = $_POST['examname'];
							$streams = $_POST['stream'];
							$stream = "'".$streams."'";
							//echo $stream;
							$sql = "select * from student where stream=$stream ;" ;
							echo $sql;
							$res=$conn->query($sql);
							if($res->num_rows>0){
								?>
								<form action="../logic/results.php" class="addschl" name="school" onsubmit="return validateForm()" method="POST">
									<h2>Enter Exam Results</h2>	
									<table>
										<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
											<td></td>
											<td>Class</td>
											<td>Stream</td>
											<td>Admn</td>
											<td>Student Names</td>
											<td>Math</td>
											<td>English</td>
											<td>Kiswahili</td>
											<td>Chemistry</td>
											<td>Physics</td>
											<td>Biology</td>
										</tr>
									<?php
									while ($row=$res->fetch_assoc()){
										echo "<tr>";
										//echo "<td>".$row['class']."</td>";
										$class=$row['class'];
										//echo "<td>".$row['admno']."</td>";
										$stream=$row['stream'];
										$admno = $row['admno'];
										$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
									//	echo "<td>".$name."</td>";
										
										?>
										<td class="labels"><input type="hidden" name="<?php echo "examname[]"?>" value="<?php echo $examname; ?>"><?php echo $examname; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "class[]"; ?>" value="<?php echo $class; ?>"><?php echo $class; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "stream[]"; ?>" value="<?php echo $stream; ?>"><?php echo $stream; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "admno[]"; ?>" value="<?php echo $admno; ?>"><?php echo $admno; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "names[]"?>" value="<?php echo $name; ?>"><?php echo $name; ?></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "math[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "eng[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "kisw[]"; ?>" ></td>
										<td class="inputs" ><input style="width:80px;"  type="text" name="<?php echo "chem[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "phy[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "bio[]"; ?>" ></td>
										<?php
										echo "</tr>";
									}
									echo "</tr>";
							}
							?>
							<tr>
								<center>
									<td >
										<input type="submit" name="EnterResults" value="Enter Results" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
									</td>
								</center>
							</tr>
						</form>
						<?php
						}
					?>
						
			</section>
		</section>
	</body>
</html>