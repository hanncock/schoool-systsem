
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
							<h2>Register Stock Item</h2>
						<table>
							<tr>
								<td class="label">Item Name</td>
								<td class="inputs"><input type="text" name="itemname"></td>
								<td class="label">Item Code</td>
								<td class="inputs"><input type="text" name="itemcode"></td>
								<td class="label">Description</td>
								<td class="inputs"><input type="text" name="description"></td>
								<td class="label">N<sup>o</sup>. of Copies</td>
								<td class="inputs"><input type="number" name="copies" min="1"></td>
								<td class="label">Expiry</td>
								<td class="inputs"><input type="date" name="expiry"></td>
							</tr>
							
						</table>
						<center>
									<input type="submit" name="RegisterItem" value="Register Item" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
								</center>
					</form>
					<section class="schls">
						<?php
							if(isset($_POST['RegisterItem'])){
								require('../logic/connector.php');
								require_once('../php/session.php');
								?>	
								<h2>Stock Item List</h2>
								<?php
								$itemname = $_POST['itemname'];
								$description = $_POST['description'];
								$itemcode = $_POST['itemcode'];
								$copies = $_POST['copies'];
								$expiry =  $_POST['expiry'];
								$user = $_SESSION["username"];
								$sql="insert into stock (itemname,itemcode,description,copies,expiry,user) 
													VALUES
										('$itemname','$itemcode','$description','$copies','$expiry','$user')";
								echo $sql;
								if($conn->query($sql) === TRUE){
									echo "succesful";
								}else{
									echo "item not created";
								}
							}
						?>
					</section>
					<?php 
						require('../logic/connector.php');
						$sql = "Select * from stock ";
						$res = $conn->query($sql);
						if($res->num_rows > 0){
							?>
							<table style="width:100%;">
								<h2>Stock List</h2>
								<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;height:2.5rem;">
									<td>#</td>
									
									<td>Item Name</td>
									<td>Item Code</td>
									<td>Description</td>
									<td>Copies</td>
									<td>expiry</td>
									<td></td>
								</tr>
								<?php
								while($row = $res->fetch_assoc()){
									echo "<tr style='height:2.5rem;text-align:center'>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['id']."</td>";
										//echo "<td><img src='../images/avatar.png' style='width:40px;height:40px;'></td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['itemname']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['itemcode']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['description']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['copies']."</td>";
										echo "<td style=' border-bottom: 1px solid white;'>".$row['expiry']."</td>";
										
										?>
										<td>
											<button style="background:green;"><a href="addstock.php?edit=<?php echo $row['id'] ?>" >
												<i class="fa fa-edit"  class="action"></i></a>
											</button>
											<button style="background:red;"><a href="addstock.php?delete=<?php echo $row['id'] ?>">
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
			<?php 
				if(isset($_GET['edit'])){
					$id = $_GET['edit'];
					$sql ="SELECT * from stock where id=$id";
					echo $sql;
					$res = $conn->query($sql);
					if($res->num_rows>0){
						$row = $res->fetch_assoc();
						$itemname = $row['itemname'];
						$itemcode = $row['itemcode'];
						$description = $row['description'];
						$copies = $row['copies'];
						$created = $row['created_on'];
						$expiry = $row['expiry'];
					}
					?>
					 <section class="edit">
			<section class="editinfo">
				<form method="POST" action=""class="addschl">
						<h2>Edit Stock</h2>
						<table>
							
							<tr style="height:100px;">
								<td class="label">Item Name</td>
								<td class="inputs"><input type="text" name="itemname" value="<?php echo $itemname; ?>"></td>
								<td class="label">Item Code.</td>
								<td class="inputs"><input type="text" name="itemcode" value="<?php echo $itemcode; ?>"></td>
								<td class="label">Item Description</td>
								<td class="inputs"><input type="text" name="description" value="<?php echo $description; ?>"></td>	
								
							</tr>
							<tr style="height:100px;">	
								<td class="label">Copies</td>
								<td class="inputs"><input type="text" name="copies" value="<?php echo $copies; ?>"></td>
								<td class="label">Created on</td>
								<td class="label"><input type="hidden" name="created" value="<?php echo $created; ?>"><?php echo $created;?></td>
								<td class="label">Expiry</td>
								<td class="label"><input type="date" name="expiry" value="<?php echo $expiry; ?>"></td>
					
							</tr>
							
						</table><br><br><br>
						<center>
							<button  class="save" type="submit" name="save" value="<?php echo $row['id']; ?>">Save</button>
							<button class="close"><a href="addstock.php" >Cancel</a></button>								
						</center>
				</form>
			</section>		
		</section>
					<?php
				}
				if(isset($_POST['save'])){
					$id = $_POST['save'];
					$itemname = $_POST['itemname'];
					$description = $_POST['description'];
					$itemcode = $_POST['itemcode'];
					$copies = $_POST['copies'];
					$expiry =  $_POST['expiry'];
					$sql = "update stock set itemname='$itemname',description='$description',itemcode='$itemcode',copies='$copies',expiry='$expiry' where id=$id";
					if($conn->query($sql)===TRUE){
						header('Location:addstock.php');
					}
				}
				if(isset($_GET['delete'])){
					$id = $_GET['delete'];
					$sql ="delete from stock where id=$id";
					if($conn->query($sql)){
						echo "deleted";
					}
				}
			?>
		</section>
	</body>
</html>