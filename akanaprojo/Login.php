<html>
	<head>
		<style>
			body{
				background:lightgrey;
				color:white;
			}
			.login{
				width:300px;
				height:300px;
				background:purple;
				 position: absolute;
				 top: 20%;
				 left: 40%;
				 margin: 0 0 0 0;
				 justify-content:center;
			}
		</style>
	</head>
	<form method="POST" action="" class="login" >
		<center><h2 style="background:dodgerblue;top:0;">Login</h2></center>
		<div>
			<section>
				<p>Username</p>
				<input type="text" name="username" required>
			</section>
			<section>
				<p>Password</p>
				<input type="password" name="password" required>
			</section>
		</div><br>
		<input type="submit" name="Login" value="Login">
		<br><br>
		<button><a href="createaccount.php">Create Account</a></button>
		
		<a href="#">Forgot Password</a>
	</form>
	
	<?php
		$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "farmvet";

$conn =new mysqli($host,$dbusername,$dbpassword,$dbname);


	if(isset($_POST['Login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql ="select * from users where username='$username'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_type = $row['type'];
			if($username == $db_username && $password == $db_password){
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION['username'] = $db_username;
				$_SESSION['type'] = $db_type;
				if($_SESSION['type'] == 'User'){
					header("Location:trial.php");
				}if($_SESSION['type'] == 'Admin'){
					header("Location:admin.php");
				}if($_SESSION['type'] == 'Vet'){
					header("Location:vet.php");
				}
			}else{
				echo "Wrong Username or Password";
			}
		}
	}
	?>
</html>