<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
			function print(){
				var examname= document.getElementById('examname').value;
				var clas= document.getElementById('class').value;
				var year= document.getElementById('year').value;
				var admno= document.getElementById('admno').value;
				console.log(examname,clas,year,admno);
				window.open("../print/printstudentresults.php?examname=" + examname + "&class=" +clas + "&year=" +year + "&admno=" +admno, true);
			}
		</script>
	</head>
	<body>
		<section class="container">
			<?php include 'header.php' ?>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<h2>Query Results</h2>
					<div class="tab">
						<a href="processresult.php">
							<button class="tablinks">
								<label class="labels" id="labels">Form/Class Results</label>
							</button>
						</a>	
						<a href="streamresults.php">
							<button class="tablinks">
								<label class="labels" id="labels">Stream Results</label>
							</button>
						</a>
						<a href="studentresults.php">
							<button class="tablinks">
								<label class="labels" id="labels">Student Results</label>
							</button>
						</a>
					</div>
					<form action="" class="addschl" name="school" onsubmit="return validateForm()" method="POST">
						<table>
							<tr>
								<td class="inputs">
									<select name="year">
										<?php $i= 2000;
											$j = Date('Y');
											for($j=Date('Y'); $j>=$i; $j--){?>
												<option value="<?php echo $j."<br>"; ?>"><?php echo $j."<br>"; ?></option>
										<?php }?>
									</select>
								</td>
								<td class="label">Admn N<sup>o</sup></td>
								<td class="inputs"><input type="text" name="admno" required></td>
								<td class="label">Exam Name</td>
								<td class="inputs">
									<select name="examname" required>
										<option value="">-select Exam-</option>
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
								<td class="label">Class/Form</td>
								<td class="inputs">
									<select name="class" required>
										<option value="">-select Class-</option>
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
								
								<td><input type="submit" name="query" value="Query" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>
							</tr>
						</table>
					</form>
					<section class="schls">
						<?php
							require('../logic/connector.php');
							if(isset($_POST['query'])){
								$class = $_POST['class'];
								$examname = $_POST['examname'];	
								$year = $_POST['year'];
								//$stream = $_POST['stream'];
								$admno = $_POST['admno'];
								//$sql= "select * from results where  ";
								$sql = "SELECT admno,names,math,eng,kisw,chem,phy,bio, SUM(math+eng+kisw+chem+phy+bio) as marks FROM results WHERE examname='$examname' AND class='$class' AND year='$year' AND admno='$admno' GROUP BY names ORDER BY marks DESC;";
								//echo $sql;
								$res=$conn->query($sql);
							?>
								<h2>Exam Results</h2>
								<table>
									<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
										<!--td>#</td-->
										<td>admno</td>
										<td>Student Name</td>
										<!--td>Class/Grade</td-->
										<td>Math</td>
										<td>Eng</td>
										<td>Kisw</td>
										<td>Chem</td>
										<td>Phy</td>
										<td>Bio</td>
										<td>Total Marks</td>
									</tr>
									<?php
										while($row=$res->fetch_assoc()){
											echo "<tr>";
												//echo "<td>".$row['id']."</td>";
												echo "<td>".$row['admno']."</td>";
												echo "<td>".$row['names']."</td>";
												echo "<td>".$row['math']."</td>";
												echo "<td>".$row['eng']."</td>";
												echo "<td>".$row['kisw']."</td>";
												echo "<td>".$row['chem']."</td>";
												echo "<td>".$row['phy']."</td>";
												echo "<td>".$row['bio']."</td>";
												echo "<td>".$row['marks']."</td>";
											echo "</tr>";
										}
									?>
								</table>
								<input type="hidden" id="class" value="<?php echo $class; ?>">
								<input type="hidden" id="examname" value="<?php echo $examname; ?>">
								<input type="hidden" id="year" value="<?php echo $year; ?>">
								<input type="hidden" id="admno" value="<?php echo $admno; ?>">
								<button class="fa fa-print" style="background:green;color:white;width:auto;font-size:1rem;border-radius:10px;" onclick="print()" ><br>Print Results</button>
										<?php
							}
						?>
						
					</section>
				</section>
			</section>
		</section>
	</body>
</html>