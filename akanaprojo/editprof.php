<section name="question" style="background:purple;color:white;">
	<header style="background:dodgerblue;">
		<img src="avatar.png" id="profile" style="width:50;height:50;border-radius:50%;">
		<?php require('session.php');$username = $_SESSION['username']; echo "welcome\t".$username; ?>
		<a href="Logout.php">Logout</a>
	</header>
	</section>	
<section id="editprof" class="editprof">
			<?php
			
	$sql = "select * from users where username='$username'";
	$res = $conn -> query($sql);
	?>
	<table>
		<tr>
			<td style="background:purple;color:white;">Username</td>
			<td style="background:purple;color:white;">Password</td>
			
			<td style="background:purple;color:white;">Names</td>
			<td style="background:purple;color:white;">Email</td>
			<td style="background:purple;color:white;">Phone</td>
		
		</tr>	
	<?php
	while($row = $res->fetch_assoc()){
		echo "<tr>";
		?>
			<form method="POST">
			<td><input type='text' name='username' value='<?php echo $row['username']; ?>'></td>
			<td><input type='password' name='password' value='<?php echo $row['password']; ?>'></td>
			<!--td><input type='text' name='type' value='<!--?php echo $row['type']; ?>'></td-->
			<td><input type='text' name='names' value='<?php echo $row['names']; ?>'></td>
			<td><input type='email' name='email' value='<?php echo $row['email']; ?>'></td>
			<td><input type='number' name='phone' value='<?php echo $row['phone']; ?>'></td>
			<tr>
			<td><button type="submit" >Update</button></td>
			</form>
		<?php
		echo "</tr>";	
	}
?>

		</section>