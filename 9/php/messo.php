<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			/*var auto_refresh = setInterval(
			function loadq() {
				$('#popup').load('#popup');
			}, 1000);*/
			
			function display_c(){
				var refresh=1000; // Refresh rate in milli seconds
				mytime=setTimeout('display_ct()',refresh)
			}
			
			function load(){
				console.log('123');
				var i, tabcontent;
				tabcontent = document.getElementsByClassName("popup");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
			}
			
			
		</script>
	</head>
	<body onload="disp()">
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
					<?php
						require_once("../logic/connector.php");
						require_once('../php/session.php');

						$user = $_SESSION["username"];
						
						$sql1 = "select * from credentials where username='$user'";
						//echo $sql1;
						$rs=$conn->query($sql1);
						if($rs->num_rows>0){
							$row=$rs->fetch_assoc();
							$sender_id = $row['id'];
						}
						//echo $row['id'];
						
						$sql="Select * from credentials";
						$res = $conn->query($sql);
						if($res->num_rows>0){
							echo "<table>";
							while($row=$res->fetch_assoc()){
								echo "<tr>";
									?>
									<td>
										<a href="messo.php?edit=<?php echo $row['id']?>">
											<button style="width:300px;" onclick="load()">
												<img src='../images/avatar.png' style='height:40px;width:auto-fit;border-radius:50px;float:left;'>
												<?php echo $row['username']; ?>
												<!--?php echo  $row['fname']." ".$row['sirname']." ".$row['tname']." ".$row['othername'] ;?-->
											</button>
										</a>
									</td>
								</tr>
								<?php
							}
						}				
						if(isset($_GET['edit'])){
							$id = $_GET['edit'];
							
							$sql1 = "select username from credentials where id=$id";
							$rs=$conn->query($sql1);
							$row=$rs->fetch_assoc();
							$receiver=$row['username'];
							
							$update = true;
							$sql ="select * from message where receiver='$user' AND sender='$receiver' OR receiver='$receiver' AND sender='$user'";
							$res=$conn->query($sql);
							//$row = $rs->fetch_assoc();
							?>
							<section style="width:300px;top:300;float:right;height:400px;z-index:1;background:rgb(0,0,0,0.8);border-radius:10px;" name="popup" id="popup">
								<h2><?php echo $receiver; ?></h2>
								<section class="meso" style="width:300px;height:400px;overflow-y:scroll;background:url('../images/download.jpg');" >
									
									<?php 
										//echo "hello";
										if($res->num_rows>0){
											while($row=$res->fetch_assoc()){
												if($row['receiver'] == $user){
													?>
													<button style="float:left;background:grey;border-radius:10px;width:auto-fit;height:auto;">
														<span><?php echo $row['message'];?><br>
														<sub id="time" name="time" value="<?php echo $row['created_on']?>" style="float:left"><?php echo $row['created_on']?></sub></span>
													</button><br><br>
													<?php
												}
												if($row['sender']==$user){
													?>
													<button style="float:right;background:lightgrey;border-radius:10px;width:auto-fit;height:auto;">
														<span><?php echo $row['message'];?><br>
														<sub id="time" name="time" value="<?php echo $row['created_on']?>"><?php echo $row['created_on']?></sub></span>
													</button><br><br>
													<?php
												}
											}
										}	
										
										if(isset($_POST['sendmeso'])){
											$id = $id;
											$receiv =$receiver;
											$sender = $sender_id;
												//echo $sender;
											$message = $_POST['message'];
											$sql ="INSERT INTO message(receiver,sender,message,sender_no,receiver_no)VALUES('$receiv','$user','$message','$sender','$id')";
												//echo $sql;
											if($conn->query($sql) === TRUE){
												//echo "message sent";
											}else{
												echo "not sent";
											}
										
										}
										
									?>
									
								</section>
								<form action="" method="POST">
									<span style="width:auto-fit;display:flex;">
										<input type="text" name="message" style="width:250px;border-radius:10px;">
										<button type="submit" name="sendmeso" style="background:green"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size:1.5rem;" type="submit"></i></button>
									</span>
								</form>
							</section>
							<?php
						}
					?>
				</section>
			</section>
		</section>
	</body>
	<script>
		function disp(){
				var x = document.getElementById("time").value;
				console.log(x);
				console.log('123');
			}
		</script>
	</head>
</html>