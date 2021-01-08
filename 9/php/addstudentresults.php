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
    if(document.exam.examname.value=="")
    {
    alert("please provide the Exam Name");
      document.student.examname.focus();
      return false;
    }
	 if(document.exam.stream.value=="")
    {
    alert("please provide the stream");
      document.student.stream.focus();
      return false;
    }

  }	
    return true;
 
    </script>
	</head>
	<body>
		<section class="container">
			<?php include 'header.php' ?>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<h2>Enter Subject Results </h2>
					<div class="tab">
						
						<a href="addsubjectresults.php">
							<button class="tablinks">
								<label class="labels" id="labels">Subject Results</label>
							</button>
						</a>
						<a href="addstreamresults.php">
							<button class="tablinks">
								<label class="labels" id="labels">Stream Results</label>
							</button>
						</a>
						<a href="addresults.php">
							<button class="tablinks">
								<label class="labels" id="labels">Form Results</label>
							</button>
						</a>
						<a href="addstudentresults.php">
							<button class="tablinks">
								<label class="labels" id="labels">Student Results</label>
							</button>
						</a>
					</div>
					<form method="POST" action="" onsubmit="return validateForm()" name="exam" style="text-align:center;"> 
						<td class="label">Exam Name</td>
						<td class="inputs">
							<select name="examname" required>
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
						<td class="label">Form/Class<input type="number" name="admno"></td>
						<td><input type="submit" name="query" value="Query" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>	
					</form>
					<?php
						require_once('../logic/connector.php');
						require_once('../php/session.php');
						//$user = $_SESSION['username'];
						
						if(isset($_POST['query'])){
							$admno = $_POST['admno'];
							$sql = "select * from studentsubject where admno=$admno";
							echo $sql;
							$rs= $conn->query($sql);
							$row = $rs->fetch_assoc();
							$s1 = $row['subject1'];
							$s2 = $row['subject2'];
							$s3 = $row['subject3'];
							$name = $row["name"];
							$class = $row["class"];
							$stream = $row["stream"];
							$examname = $_POST['examname'];
							
						
								$admno = $row['admno'];
								$year = date('Y');	
							
							$res=$conn->query($sql);
							if($res->num_rows>0){
								?>
								<form action="addstudentresults.php" method="POST">
									<h2>Enter Exam Results</h2>	
									<table style="width:100%;">
										<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
											<td>Student Names</td>
											<td>Class</td>
											<td>Stream</td>
											<td>Admn</td>
											<td>exam</td>
											<td><?php echo $s1; ?></td>
											<td><?php echo $s2; ?></td>
											<td><?php echo $s3; ?></td>
											<td>Year</td>
										</tr>
										<tr>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "names"; ?>" value="<?php echo $name; ?>"><?php echo $name; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "class"; ?>" value="<?php echo $class; ?>"><?php echo $class; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "stream"; ?>" value="<?php echo $stream; ?>"><?php echo $stream; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "admno"; ?>" value="<?php echo $admno; ?>"><?php echo $admno; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "examname"; ?>" value="<?php echo $examname; ?>"><?php echo $examname; ?></td>
										<td class="inputs" style=' border-bottom: 1px solid white;'><input type="number" name="<?php echo $s1; ?>" ></td>
										<td class="inputs" style=' border-bottom: 1px solid white;'><input type="number" name="<?php echo $s2; ?>" ></td>
										<td class="inputs" style=' border-bottom: 1px solid white;'><input type="number" name="<?php echo $s3; ?>" ></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "year"; ?>" value="<?php echo $year; ?>"><?php echo $year; ?></td>
									 
										<?php
										echo "</tr>";
									}
									echo "</tr>";
							}
							?>
							<tr>
								<center>
									<td >
										<input type="submit" name="EnterResults" value="Enter Results" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
									</td>
								</center>
							</tr>
						</form>
						<?php
						if(isset($_POST['EnterResults'])){
							
							$class = $_POST["class"];
							$stream = $_POST["stream"];
							$year = $_POST["year"];
							$examname = $_POST["examname"];
							$s1 = $_POST[''];
								$sql = "SELECT * from results where examname='$examname' AND class='class' AND stream='$stream' AND year=$year";
								//echo $sql;
								if($conn->query($sql) === TRUE){
									
										$sql = "UPDATE results set $s1=".($_POST[$s1]).", $s2=".($_POST[$s2])." WHERE admno=".$_POST["admno"]." AND examname='$examname'";
										echo $sql;
										if($conn->query($sql)=== TRUE){
											echo "success";
										}else{
											echo "nothing";
										}
									
								}else{
								
										$sql ="INSERT INTO results(`examname`,`class`,`stream`,`names`,`admno`,`$s1`,`$s2`,`$s3`,`year`)
															VALUES
												('".($_POST["examname"])."','".($_POST["class"])."','".($_POST["stream"])."','".($_POST["names"])."','".($_POST["admno"])."','".($_POST[$s1])."','".($_POST[$s2])."','".($_POST[$s3])."','".($_POST["year"])."')";
										echo $sql;
										 if($conn->query($sql)=== TRUE){
											//echo "success";
										}else{
											echo "nothing";
										}
									
									
								}

							}
					?>
						
			</section>
		</section>
	</body>
</html>