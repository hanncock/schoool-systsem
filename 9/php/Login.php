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
	
	<section class="container" style="background:red;">
			<section class="display">
				<section class="disp">
					<section class="schls">
						<center>
							<form class="login" name="login" action="" method="POST">
								<h2 style="width:40%">Login</h2>
								<label>Username</label><br>
								<input type="text" name="username" required><br>
								</label>Password</label><br>
								<input type="password" name="password" required><br><br>
								<center>
									<input type="submit" name="Login" value="Login" style="width:6rem;background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
								</center>
							</form>
						</center>
					</section>	
				</section>
			</section>
		</section>
	
	
		<section class="container" class="addschl">
			<?php
				require_once('../logic/connector.php');
				if(isset($_POST['Login'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$sql = "select * from credentials ";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
						$db_username = $row['username'];
						$db_password = $row['password'];
						$db_type = $row['type'];
						if($db_username == $username && $db_password == $password){
							session_start();
							$_SESSION['username'] = $db_username;
							$_SESSION['type'] = $db_type;
							if($_SESSION['type'] == '0'){
								header("Location:index.php");
							}if($_SESSION['type'] == '1'){
								echo "welcome sir";
							}
						}else{
							echo "wrong username or password";
						
						}
					}
				}
			?>
		</section>
	</body>
</html>