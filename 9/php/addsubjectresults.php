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
						<td class="label">Form/Class</td>
						<td class="inputs">
							<select name="clsname" >
								<option value="">--Select Form--</option>
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
						<td class="label">Exam Name</td>
						<td class="inputs">
							<select name="stream" required>
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
						<td><input type="submit" name="query" value="Query" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>	
					</form>
					<?php
						require_once('../logic/connector.php');
						require_once('../php/session.php');
						$user = $_SESSION['username'];
						$sql = "select * from teacher where name='$user'";
						//echo $sql;
						$rs= $conn->query($sql);
						$row = $rs->fetch_assoc();
						$s1 = $row['subject1'];
						$s2 = $row['subject2'];
						$s3 = $row['subject3'];
						if(isset($_POST['query'])){
							//$class = $_POST['class'];
							$examname = $_POST['examname'];
							$streams = $_POST['stream'];
							$clas = $_POST['clsname'];
							$class = "'".$clas."'";
							$stream = "'".$streams."'";
							//echo $stream;
							$sql = "select * from student where stream=$stream and class=$class ;" ;
						//	echo $sql;
							$res=$conn->query($sql);
							if($res->num_rows>0){
								?>
								<form action="" class="addschl" name="school" onsubmit="return validateForm()" method="POST">
									<h2>Enter Exam Results</h2>	
									<table style="width:100%;">
										<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
											<td>Student Names</td>
											<td>Class</td>
											<td>Stream</td>
											<td>Admn</td>
											<td>exam</td>
											<td><?php echo $s1?></td>
											<td><?php echo $s2?></td>
											<td><?php echo $s3?></td>
											<td>Year</td>
										</tr>
									<?php
									while ($row=$res->fetch_assoc()){
										//echo "123";
										echo "<tr style='height:2rem;'>";
										//echo "<td>".$row['class']."</td>";
										$class=$row['class'];
										//echo "<td>".$row['admno']."</td>";
										$stream=$row['stream'];
										$admno = $row['admno'];
										$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
										$year = date('Y');
										//echo $year;
									//	echo "<td>".$name."</td>";
										
										?>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "names[]"; ?>" value="<?php echo $name; ?>"><?php echo $name; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "class[]"; ?>" value="<?php echo $class; ?>"><?php echo $class; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "stream[]"; ?>" value="<?php echo $stream; ?>"><?php echo $stream; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "admno[]"; ?>" value="<?php echo $admno; ?>"><?php echo $admno; ?></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "examname[]"; ?>" value="<?php echo $examname; ?>"><?php echo $examname; ?></td>
										<td class="inputs" style=' border-bottom: 1px solid white;'><input style="width:40px;"  type="number" name="<?php echo $s1."[]"; ?>" ></td>
										<td class="inputs" style=' border-bottom: 1px solid white;'><input style="width:40px;"  type="number" name="<?php echo $s2."[]"; ?>" ></td>
										<td class="inputs" style=' border-bottom: 1px solid white;'><input style="width:40px;"  type="number" name="<?php echo $s3."[]"; ?>" ></td>
										<td class="labels" style=' border-bottom: 1px solid white;'><input type="hidden" name="<?php echo "year[]"; ?>" value="<?php echo $year; ?>"><?php echo $year; ?></td>
									 
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
						}
						if(isset($_POST['EnterResults'])){
							
							$admno = count($_POST['admno']);
							$class = $_POST["class"][0];
							$stream = $_POST["stream"][0];
							$year = $_POST["year"][0];
							$examname = $_POST["examname"][0];
						
								$sql = "SELECT * from results where examname='$examname' AND class='class' AND stream='$stream' AND year=$year";
								//echo $sql;
								if($conn->query($sql) === TRUE){
									for($i=0; $i<$admno; $i++){
										$sql = "UPDATE results set $s1=".($_POST[$s1][$i]).", $s2=".($_POST[$s2][$i])." WHERE admno=".$_POST["admno"][$i]." AND examname='$examname'";
										echo $sql;
										if($conn->query($sql)=== TRUE){
											echo "success";
										}else{
											echo "nothing";
										}
									}
								}else{
									for($i=0; $i<$admno; $i++){
										$sql ="INSERT INTO results(`examname`,`class`,`stream`,`names`,`admno`,`$s1`,`$s2`,`$s3`,`year`)
															VALUES
												('".($_POST["examname"][$i])."','".($_POST["class"][$i])."','".($_POST["stream"][$i])."','".($_POST["names"][$i])."','".($_POST["admno"][$i])."','".($_POST[$s1][$i])."','".($_POST[$s2][$i])."','".($_POST[$s3][$i])."','".($_POST["year"][$i])."')";
										//echo $sql;
										 if($conn->query($sql)=== TRUE){
											//echo "success";
										}else{
											echo "nothing";
										}
									}
									
								}

							}
					?>
						
			</section>
		</section>
	</body>
</html>