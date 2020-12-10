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
			<section class="header">
				<img src="../images/logo.png" class="logo">
				<form action="" method="POST" class="search">
					<input type="text" name="search" placeholder="Search..." class="srchtxt">
					<button type="submit" class="srchbtn"><i class="fa fa-search"></i></button>
				</form>	
				<span class="icons">
					<i class="fa fa-envelope"></i>
					<i class="fa fa-phone"></i>
					<i class="fa fa-phone"></i>
					<i class="fa fa-phone"></i>
				</span>
				<span class="user">
					<img src="../images/avatar.png" class="userimg"> <br>
				<span>
			</section>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<form method="POST" action="">
							<h2>Register Book</h2>
						<table>
							<tr>
								<td class="label">Book Name</td>
								<td class="inputs"><input type="text" name="bookname"></td>
								<td class="label">Code:/Range</td>
								<td class="inputs"><input type="text" name="bookcode"></td>
								<td class="labels">Category</td>
								<td class="inputs"><input type="text" name="category"></td>
								<td class="label">N<sup>o</sup>. Copies</td>
								<td class="inputs"><input type="number" name="copies"></td>
							</tr>
						</table>
						<center>
							<input type="submit" name="CreateBook" value="Register Book" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
						</center>
					</form>
					<section class="schls">
						<?php
							if(isset($_POST['CreateBook'])){
								require('../logic/connector.php');
								?>	
								<h2>Book List</h2>
								<?php
								$bookname = $_POST['bookname'];
								$bookcode = $_POST['bookcode'];
								$category = $_POST['category'];
								$copies = $_POST['copies'];
								$sql="insert into library (bookname,bookcode,copies,category) VALUES('$bookname','$bookcode','$copies','$category')";
								//echo $sql;
								if($conn->query($sql) === TRUE){
									?>
									<section class="popup" name="popup" id="popup">
										<section class="meso">
											<center>
												<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
												Book Created Succesfully<br><br><br>
												<a href="registerbook.php">
													<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
												</a>
											</center>
										</section>
									</section>
									<?php
								}else{
									?>
									<section class="popup" name="popup" id="popup">
										<section class="meso">
											<center>
												<img src='../images/error.png' style="width:100px;height:100px;"><br><br>
												Book Not Created<br><br><br>
												<a href="registerbook.php">
													<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
												</a>
											</center>
										</section>
									</section>
									<?php
								}
							}
						?>
					</section>
					<?php 
						require('../logic/connector.php');
						$sql = "Select * from library ";
						$res = $conn->query($sql);
						if($res->num_rows > 0){
							?>
							<table style="width:100%;">
								<h2>Books List</h2>
								<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:2.5rem;">
									<td>#</td>
									<td>Cover</td>
									<td>Book Name</td>
									<td>Book Code</td>
									<td>Copies</td>
									<td>Category</td>
									<td></td>
								</tr>
								<?php
								while($row = $res->fetch_assoc()){
									echo "<tr style='height:2.5rem;text-align:center'>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['id']."</td>";
										echo "<td><img src='../images/avatar.png' style='width:40px;height:40px;'></td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['bookname']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['bookcode']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['copies']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['category']."</td>";
										
										?>
										<td>
											<button style="background:green;"><a href="registerbook.php?edit=<?php echo $row['id'] ?>" >
												<i class="fa fa-edit"  class="action"></i></a>
											</button>
											<button style="background:red;"><a href="registerbook.php?delete=<?php echo $row['id'] ?>">
												<i class="fa fa-trash"  class="action"></i>
											</a></button>
										</td>
										
										<?php
									echo "</tr>";
								}
							?></table><?php
						}
					?>
				</section>
			</section>
		</section>
	</body>
</html>