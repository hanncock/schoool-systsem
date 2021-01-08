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
					<section class="schls">
						<?php
							require("../logic/connector.php");
							$sql ="select * from returned ";
							$res=$conn->query($sql);
							if($res->num_rows>0){
								?>
								<h2>Returned Books</h2>
								<table style="width:100%; overflow-y: scroll;">
									
									
										<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:3rem;">
											<!--td>ID</td-->
											<td>Adm NO.</td>
											<td>Student</td>
											<td>Book Name</td>
											<td>Book Code</td>
											<td>Copies Issued</td>
											<td>Copies Returned</td>
											<td>Category</td>
											<td>Issue Date</td>
											<td>Return Date</td>
											
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
										echo "<td style=' border-bottom: 1px solid white;'>".$row['copies_returned']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['category']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['category']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['created_on']."</td>";
										//echo "<td style=' border-bottom: 1px solid white;'>After 2 Weeks</td>";
									echo "</tr>";
								}
							}
							
							?></table>
				</section>
						
			</section>
		</section>
	</body>
</html>