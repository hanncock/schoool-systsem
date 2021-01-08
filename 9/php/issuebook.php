<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<!--script>
			function check(){
				var copies = document.getElementById('copiesissued').value;
				var copiesreturned = document.getElementById('copiesreturned').value;
				
				if(copiesreturned < copiesissued){
					alert('student will be returning less than the issued book copies');
					return false;
				}
				if(copiesreturned > copiesissued){
					alert('student is returning more than the issued book copies');
					return false;
				}
				
				return true;
			}
		</script-->
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
					<form method="POST" action="" onsubmit="return(check())" name="myform">		
							<h2>Issue Book</h2>
						<table>
							<tr>
								<td class="label">Book Name</td>
								<td class="inputs">
									<input list="bookname" name="bookname" onchange="showHint(this.value)" id="bookname" required>
										<datalist id="bookname">
											<?php
												require('../logic/connector.php');
												$sql = "select bookname from library";
												$rs = $conn->query($sql);
												while($row = $rs->fetch_assoc()){
													echo "<option value='".$row['bookname']."'>".$row['bookname']."</option>";
												}
											?>
										</datalist>
									</input>
								</td>	
								<td class="label">Student</td>
								<td class="inputs"><input type="text" name="admno" onchange="search(this.value)" id="student" required></td>
								<td>
									<p >Copies Available: <span id="txtHint" style="background:dodgerblue; color:white"></span></p>
									<input type="hidden" name="price" id="price">
								</td>
								<td class="label">N<sup>o</sup>. Copies</td>
								<td class="inputs"><input type="number" name="copies" id="copies" required></td>
								<td><input type="submit" name="issuebook" value="Issue Book" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;"></td>
							</tr>
							
								<span id="stude" ></span><input type="hidden" name="names" id="names"></td>
							
						</table>
						<center>
							
						</center>
					</form>
					<section class="schls">
						<?php
							if(isset($_POST['issuebook'])){
								require('../logic/connector.php');
								?>	
								
								<?php
								$bookname = $_POST['bookname'];
								$admno = $_POST['admno'];
								$copies = $_POST['copies'];
								$copiesavailable = $_POST['price'];
								
								$copiesleft=$copiesavailable-$copies;
								
								$sql2 = "select * from library where bookname='$bookname'";
								//echo $sql2;
								$res = $conn->query($sql2);
								if($res->num_rows>0){
									$row = $res->fetch_assoc();
									$id = $row['id'];
									//echo $id;
								}
								
								$sql = "select * from student where admno=$admno";
								$rs = $conn->query($sql);
								if($rs->num_rows>0){
									$row = $rs->fetch_assoc();
									$admno = $row['admno'];
									$name = $row['fname'].$row['sirname'].$row['tname'].$row['othername'];
									
									$sql ="insert into issued(admno,names,bookname,bookcode,copies,category)
														VALUES
											('$admno','$name','$bookname','0123','$copies','anime')";
											
									if($conn->query($sql) === TRUE){
										echo "book issued";
									}else{
										echo "book not issued";
									}
									
									$sql1="UPDATE library SET copies='$copiesleft' WHERE id=$id";
									if($conn->query($sql1) === TRUE){
										
									}else{
										echo "not Error on updating library Book Stock";
									}
								}
								
							}
							$sql ="select * from issued ";
							$res=$conn->query($sql);
							if($res->num_rows>0){
								?>
								<h2>Issued Books</h2>
								<table style="width:100%; overflow-y: scroll;">
									
									
										<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:3rem;">
											<!--td>ID</td-->
											<td>Adm NO.</td>
											<td>Student</td>
											<td>Book Name</td>
											<td>Book Code</td>
											<td>Copies Issued</td>
											<td>Category</td>
											<td>Issue Date</td>
											<td>Return Date</td>
											<td>Action</td>
										</tr>
								
								<?php
								while($row=$res->fetch_assoc()){
									echo "<tr style='text-align:center;height:3rem;'>";
									//	echo "<td>".$row['id']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['admno']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['names']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['bookname']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['bookcode']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['copies']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['category']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['category']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>After 2 Weeks</td>";
										?>
										<td>
											<button style="background:dodgerblue;color:white;">
												<a href="issuebook.php?return=<?php echo $row['id'] ?>">Return</a>
											</button>
										</td>	
									
										<?php
										
									echo "</tr>";
								}
							}
							
							?></table></table><?php
						//}
					?>
				</section>
									<?php
						if(isset($_GET['return'])){
							$id = $_GET['return'];
							
							$sql = "select * from issued where id=$id";
							$res = $conn->query($sql);
							$row = $res->fetch_assoc();
							?>
							<section class="edit">
								<section class="editinfo">
									<form method="POST" action="" onsubmit="check()">
											<h2>Return Book</h2>
											<table>
												<tr style="height:50px;width:100%;">	
													<td class="label">
														Admission No:
														<input type="hidden" name="admno" value="<?php echo $row['admno']; ?>">
														<span style="color:blue"><?php echo $row['admno']; ?></span>
													</td>
													<td class="label">
														Student Name:
														<input type="hidden" name="names" value="<?php echo $row['names']; ?>">
														<span style="color:blue"><?php echo $row['names']; ?></span>
													</td>
												</tr><br>
												<tr style="height:50px;">	
													<td class="label">
														Book Name:
														<input type="hidden" name="bookname" value="<?php echo $row['bookname']; ?>">
														<span style="color:blue"><?php echo $row['bookname']; ?></span>
													</td>
													<td class="label">
														Book Code:
														<input type="hidden" name="bookcode" value="<?php echo $row['bookcode']; ?>">
														<span style="color:blue"><?php echo $row['bookcode']; ?></span>
													</td>
													<td class="label">
														category:
														<input type="hidden" name="category" value="<?php echo $row['category']; ?>">
														<span style="color:blue"><?php echo $row['category']; ?></span>
													</td>
												</tr>
												<tr style="height:50px;">
													<td class="label">
														Copies Issued:
														<input type="hidden" name="copies" id="copiesissued" value="<?php echo $row['copies']; ?>">
														<span style="color:blue"><?php echo $row['copies']; ?></span>
													</td>
													<td class="label">
														Copies Returned:
														<input type="number" name="copiesreturned" min="0"id="copiesreturned" style="width:40px;">
													</td>
													<td class="label">Due Date:<span style="color:blue"><?php echo $row['created_on']; ?></span></td>
													<!--td class="label">Date Returned:<input type="date"  name="datereturned" required></td-->
													<!--td class="label">Fine Imposed:<input type="number" style="width:40px;" name="fine" required></td-->
												</tr>
											</table><br><br
											<center>
												<button  class="save"  type="submit" name="save" value="<?php echo $row['id']; ?>">Return</button>
												<button class="close"><a href="issuebook.php" >Cancel</a></button>								
											</center>
									</form>
									<?php
									if(isset($_POST['save'])){
							$id = $_POST['save'];
							$admno = $_POST['admno'];
							$names = $_POST['names'];
							$bookname = $_POST['bookname'];
							$bookcode = $_POST['bookcode'];
							$category = $_POST['category'];
							$copies = $_POST['copies'];
							$copiesreturned = $_POST['copiesreturned'];
							
							//echo $copies."".$copiesreturned."<br>";
							
							if($copiesreturned > $copies){
								echo "student returning more than issued books";
							}
							if($copiesreturned < $copies){
								echo "student is returning less books";
							}
							if($copiesreturned === $copies){
								$sql = "insert into returned(admno,names,bookname,bookcode,copies,copies_returned,category)
															VALUES
										('$admno','$names','$bookname','$bookcode','$copies','$copiesreturned','$category')";
										//echo $sql;
								if($conn->query($sql) === TRUE){
									$sql1 = "delete from issued where id=$id";
									if($conn->query($sql1) === TRUE){
										//echo $sql1;
										//header("Location:addpayment.php");
									}
								}
							}
						} ?>
								</section>		
							</section>
							<?php
						}
						
					?>
			</section>
		</section>
	</body>
</html>