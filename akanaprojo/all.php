<?php
	if(isset($_GET['question'])){
		$question = $_GET['question'];
		$sql ="select * from comments where question='$question'";
		echo $sql;
	}

	/*if(isset($_POST['Login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql ="select * from users where username='$username'";
		$res = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_type = $row['type'];
			if($username == $db_username && $password == $db_password){
				session_start();
				$_SESSION['username'] = $db_username;
				$_SESSION['type'] = $db_type;
				if($_SESSION['type'] == 'User'){
					header("Location:userpage.php");
				}if($_SESSION['type'] == 'Admin'){
					header("Location:admin.php");
				}if($_SESSION['type'] == 'Vet'){
					header("Location:vet.php");
				}
			}else{
				echo "Wrong Username or Password";
			}
		}
	}*/
?>