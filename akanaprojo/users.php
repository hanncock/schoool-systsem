<?php
include('session.php');
$username = $_SESSION['username']; 
?>
<html>
<style>
	body{
		background:lightgrey;
	}
	table{
		display:inline-table;
		width:95%;
	}
	tr{
		border-bottom:1px solid red;
	}
	td{
		height:3rem;
		border-bottom:1px solid dodgerblue;
	}
</style>
<body>
<section name="question" style="background:purple;color:white;">
	<ul style="color:white;">
		<a style="color:white;" href="#">Users</a>
		<a style="color:white;" href="admin.php">Posts</a>
		<a style="color:white;" href="createaccount.php">Create Acc</a>
	</ul>
	<header style="background:dodgerblue;"><img src="avatar.png" style="width:50;height:50;border-radius:50%;" id="profile"><?php echo "welcome\t".$username; ?><a href="Logout.php">Logout</a></header>
		<form method="POST" action="trial.php">
			<h3>Enter New Post</h3><input type="text" name="question" style="height:2rem; width:16rem;border-radius:10px;" placeholder="type new question.....">
			<button type="submit" style="background:green;color:white;" name="submit">Post</button>
		</form>
		
	</section>	
<?php
	require('session.php');
	$sql = "select * from users";
	$res = $conn -> query($sql);
	?>
	<table>
		<tr>
			<td style="background:purple;color:white;">Username</td>
			<td style="background:purple;color:white;">Password</td>
			<td style="background:purple;color:white;">Type</td>
			<td style="background:purple;color:white;">Names</td>
			<td style="background:purple;color:white;">Email</td>
			<td style="background:purple;color:white;">Phone</td>
			<td style="background:purple;color:white;">Action</td>
		</tr>	
	<?php
	while($row = $res->fetch_assoc()){
		echo "<tr>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['password']."</td>";
			echo "<td>".$row['type']."<t/d>";
			echo "<td>".$row['names']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['phone']."</td>";
			echo "<td>Delete Edit</td>";
		echo "</tr>";	
	}
?>
</table>
</body>
</html>