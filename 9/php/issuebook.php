<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
			function showHint(str) {
				if (str.length == 0) {
					 document.getElementById("bookname").innerHTML = "";
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						 document.getElementById("txtHint").innerHTML = this.responseText;
						 document.getElementById("price").value=document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "../logic/searchdb.php?bookname=" + str, true);
				xmlhttp.send();
				}
			}
			
			function search(str) {
				if (str.length == 0) {
					 document.getElementById("student").innerHTML = "";
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						 document.getElementById("stude").innerHTML = this.responseText;
						 document.getElementById("names").value=document.getElementById("stude").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "../logic/searchdb.php?admno=" + str, true);
				xmlhttp.send();
				}
			}
			
			function check(){
				var c = document.getElementById('price').value;
				var d = document.getElementById('copies').value;
				console.log(d,c);
				if(d >= c){
					alert("can't issue greater than number in stock");
					document.myform.copies.focus();
					return false;
				}else{
						return true;
				}
				
			}
		</script>
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
										<td><button style="background:dodgerblue;color:white;">Return</button></td>
										<?php
										
									echo "</tr>";
								}
							}
							
							?></table></table><?php
						//}
					?>
				</section>
			</section>
		</section>
	</body>
</html>