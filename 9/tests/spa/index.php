<!DOCTYPE html>
<html lang="en">
	<head>
		<!--meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Single Page Layout</tilte-->
	</head>
	<body>
		<section class="menu">
			<a href="index.php">Home</a>
			<a href="index.php?page=<?php echo "addstudent"?>">Add Student</a>
			<a href="index.php"></a>
		</section>
		<?php 
		echo "welcome";
			if(!isset($_GET['page'])){
				include('home.php');
			}else{
				$page = $_GET['page'];
				echo $page."php";
				//include($page."php");
			}
		?>
	</body>
</html>