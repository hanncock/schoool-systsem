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
					<h2>Transfer Activate/Deactivate Student</h2>
					<div class="tab">
						<a href="transfer.php">
							<button class="tablinks">
								<label class="labels" id="labels">Transfer Form/Class</label>
							</button>
						</a>	
						<a href="transferstudent.php">
							<button class="tablinks">
								<label class="labels" id="labels">Transfer Student</label>
							</button>
						</a>
						<a href="activatestudent.php">
							<button class="tablinks">
								<label class="labels" id="labels">Activate Student</label>
							</button>
						</a>
						<a href="deactivatestudent.php">
							<button class="tablinks">
								<label class="labels" id="labels">De-Activate Student</label>
							</button>
						</a>
					</div>
					<form method="POST" action="" onsubmit="return validateForm()" name="exam"> 
						<td class="label">Class/Form From</td>
						<td class="inputs">
							<select name="classfrom" required>
								<option value="">--From--</option>
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
						<td class="label">Class to</td>
						<td class="inputs">
							<select name="classto" required>
								<option value="">--To--</option>
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
						<td><input type="submit" name="query" value="Query" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>	
					</form>
					<?php
						require_once('../logic/connector.php');
						if(isset($_POST['query'])){
							//$class = $_POST['class'];
							$classfrom = $_POST['classfrom'];
							$classto = $_POST['classto'];
							//$stream = "'".$streams."'";
							//echo $stream;
							$sql = "select * from student where class='$classfrom' ;" ;
							//echo $sql;
							$res=$conn->query($sql);
							if($res->num_rows>0){
								?>
								<form action="../logic/transfer.php" class="addschl" name="school" onsubmit="return validateForm()" method="POST">
									<h2>Transfer Form/Class</h2>	
									<table>
										<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
											<td></td>
											<td>ClassFrom</td>
											<td>Classto</td>
											<td>Stream</td>
											<td>Admn</td>
											<td>Student Names</td>
										</tr>
										<?php
											while ($row=$res->fetch_assoc()){
										echo "<tr>";
											//echo "<td>".$row['class']."</td>";
											$id=$row['id'];
											$class=$row['class'];
											//echo "<td>".$row['admno']."</td>";
											$stream=$row['stream'];
											$admno = $row['admno'];
											$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
										//	echo "<td>".$name."</td>";
										
										?>
										<td class="labels"><input type="hidden" name="<?php echo "id[]"?>" value="<?php echo $id; ?>"><?php echo $id; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "classfrom"?>" value="<?php echo $classfrom; ?>"><?php echo $classfrom; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "classto"?>" value="<?php echo $classto; ?>"><?php echo $classto; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "stream[]"; ?>" value="<?php echo $stream; ?>"><?php echo $stream; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "admno[]"; ?>" value="<?php echo $admno; ?>"><?php echo $admno; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "names[]"?>" value="<?php echo $name; ?>"><?php echo $name; ?></td>
										<?php
										echo "</tr>";
									}
									echo "</tr>";
									?>
							<tr>
								<center>
									<td >
										<input type="submit" name="Transfer" value="<?php echo 'Transfer:'.$classfrom; ?>" style="background:green;height:2rem;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
									</td>
								</center>
							</tr>
						</form>
						<?php
							}
							
						}
					?>
					<?php
						if(isset($_GET['popup'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Students Have Been Transferred Succesffully<br><br><br>
										<a href="transfer.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
							<?php
						}
					?>
			</section>
		</section>
	</body>
</html>