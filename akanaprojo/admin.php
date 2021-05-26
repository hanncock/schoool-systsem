<?php
include('session.php');
$username = $_SESSION['username']; 

	if(isset($_POST['submit'])){
		$question = $_POST['question'];
		$sender = $_SESSION['username'];
		$sql = "insert into questions(sender,question)values('$sender','$question')";
		//echo $sql;
		if($conn->query($sql) === TRUE){
			//echo "Question Posted"."<br>" ;
		}else{
			echo "Error:";
		}	
		
	}
?>
<html>
<head>
<style>
*{
	text-decoration:none;
}
body{
	background:lightgrey;
	color:black;
	width:100%;
	height:100%;
}
.comments{
	width:100%;
	height;100%;
	height:400px;
	top:0px;
	left:0px;
	z-index:1;
	background:rgb(0,0,0,0.8);
	position:absolute;
	color:white;
	display:block;
}
.commentsview{
	margin: auto;
	width: 80%;
	border-radius:10px;
	padding: 10px;
	background:lightgrey;
	color:black;
	text-align:center;
}
.questions{
	display:inline-flex;
	gap:2rem;
}
</style>
<script>
	function dia(){
		document.getElementById('comments').style.display="none";
	}
</script>
</head>
<body>

	<section name="question" style="background:purple;color:white;">
	<ul style="color:white;">
		<a style="color:white;" href="users.php">Users</a>
		<a style="color:white;" href="#">Posts</a>
		<a style="color:white;" href="createaccount.php">Create Acc</a>
	</ul>
	<header style="background:dodgerblue;"><img src="avatar.png" style="width:50;height:50;border-radius:50%;" id="profile"><?php echo "welcome\t".$username; ?><a href="Logout.php">Logout</a></header>
		<form method="POST" action="trial.php">
			<h3>Enter New Post</h3><input type="text" name="question" style="height:2rem; width:16rem;border-radius:10px;" placeholder="type new question.....">
			<button type="submit" style="background:green;color:white;" name="submit">Post</button>
		</form>
		
	</section>	
<?php
	$host = "127.0.0.1";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "farmvet";

	$conn =new mysqli($host,$dbusername,$dbpassword,$dbname);
	
	?>
	<!--center><h2 style='background:purple;color:white;'>My Questions/ Posts</h2></center-->
	<section class="questions" id="questions">
		<section class="myquestions">
		<center><h2 style='background:purple;color:white;'>My Posts</h2></center>
		<?php
		$sql ="select  * from questions where sender='$username'";
		$res= $conn->query($sql);
		while($row=$res->fetch_assoc()){
			?>
			<button style="min-height:2rem;font-family:cursive;color:white;width:22rem;">
				<a href='trial.php?viewcomments=<?php echo $row['id']?>'>
				<sup style="float:left;">
					<img src="avatar.png" style="width:20px;height:20px;border-radius:50%;">
					<?php echo $row['sender'];?>
				</sup><br>
				<?php $question = $row['question']; echo $question;?></a>
			</button><button><a href='trial.php?deletequestion=<?php echo $row['id']?>'>Del</a></button><br><br>
			<?php	
		}
		?>
		</section>
		<section class="othersquestions">
			<center><h2 style='background:purple;color:white;'>Trending Posts</h2></center>
			<?php
				$sql = "select * from questions where sender!='$username'";
				$res = $conn->query($sql);
				while($row = $res-> fetch_assoc()){
					?>
				<button style="min-height:2rem;font-family:cursive;color:white;width:22rem;">
					<a href='trial.php?viewcomments=<?php echo $row['id']?>'>
					<sup style="float:left;">
						<img src="avatar.png" style="width:20px;height:20px;border-radius:50%;">
						<?php echo $row['sender'];?>
					</sup><br>
					<?php $question = $row['question']; echo $question;?></a>
				</button>
				<?php
				}
			?>
		</section>
		
		<section class="othersquestions">
			<center><h2 style='background:purple;color:white;'> Contact Vets</h2></center>
			<?php
				$sql = "select * from questions where sender!='$username'";
				$res = $conn->query($sql);
				while($row = $res-> fetch_assoc()){
					?>
				<button style="min-height:2rem;font-family:cursive;color:white;width:22rem;">
					<a href='trial.php?viewcomments=<?php echo $row['id']?>'>
					<?php $question = $row['question']; echo $question;?></a>
				</button>
				<?php
				}
			?>
		</section>
		
	</section>
	<?php
	if(isset($_GET['viewcomments'])){
		?>
		<section class="comments" id="comments">
			<button onclick="dia()"><!--a href="trial.php"-->Close<!--/a--></button>
			<section class="commentsview">
				<?php
					$id = $_GET['viewcomments'];
					$sql1 = "select * from questions where id=$id";
					$ress = $conn ->query($sql1);
					$row1 = $ress ->fetch_assoc();
					echo "<p style='background:purple;color:white;min-height:4rem;font-size:2rem;font-family:cursive;'>".$row1['question']."</p><br>";
					?>
					<form method="POST" action="#">
						<input type="hidden" name="question" value="<?php echo $row1['question']; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type='text' name='comment' placeholder='enter your comment....'>
						<input type='submit' name='send' value='send'><br>
					</form>
					<?php 
					if(isset($_POST['comment'])){
						$id = $_POST['id'];
						$question = $_POST['question'];
						$comment = $_POST['comment'];
						$sql = "insert into comments (question,comment,replier,questionid)values('$question','$comment','$username','$id')";
						//echo $sql;
						if($conn->query($sql) === TRUE){
							//echo "Question Posted"."<br>" ;
						}else{
							echo "Error:";
						}
					}
					$sql = "select * from comments where questionid=$id order by id desc";
					//echo $sql;
					$res = $conn -> query($sql);
					while($row = $res->fetch_assoc()){
						?>
						<p style='min-height:1rem;background:rgb(0,0,0,0.8);color:white;text-align:left;'>
							<sup>
								<img src="avatar.png" style="width:20px;height:20px;border-radius:50%;">
								<?php echo $row['replier']; ?>
							</sup><br>
							<?php echo $row['comment']; ?>
						</p>
						<?php
					}
				?>
			</section>
			
		</section>
		<?php
	}
?>
</body>
<script>
	
	var prof = document.getElementById('profile');
	document.addEventListener('DOMContentLoaded', function () {
    prof.addEventListener('click', function(){
		console.log('me is cliced');
	});
});
</script>
</html>