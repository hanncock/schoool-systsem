<style>
body{
	background:lightgrey;
}
.form{
	display:inline-table;
}
</style>
<?php
	include('session.php');
	if(isset($_POST['create'])){
		$names = $_POST['names'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
			
		$sql ="Insert into users(username,password,names,email,phone)values('$username','$password','$names','$email','$phone')";
		echo $sql;
		if($conn->query($sql) === TRUE){
			header('Location: login.php');
		}else{
			echo "login error";
		}
	}
?>
<html>
	<head>
	</head>
	<body>
		<h2 style="background:purple;color:white;">Create Account</h2>
		<form method="POST" action="#">
		<table>
		<tr>
			<td>Names:</td>
			<td><input type="text" name="names" required></td>
		</tr>
		<tr>		
			<td>Username</td>
			<td><input type="text" name="username" required></td>
		</tr>
		<tr>	
			<td>phone</td>
			<td><input type="number" name="phone" required min="0"></td>
		</tr>
		<tr>	
			<td>Email</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>	
			<td>Password</td>
			<td><Input type="password" name="password" required></td>
		</tr>	
		<tr>	
			<td>Password</td>
			<td><Input type="password2" name="password2" required></td>
		</tr>	
			<td><center><button type="submit" name="create">Create Account</button></center></td>
		</form>
	</body>
</html>