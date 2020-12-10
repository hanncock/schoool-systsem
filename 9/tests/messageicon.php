<script>
	function load(id){
		 var x = document.getElementById("mesopopup");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
		// document.getElementById('mesopopup').style.display="block";
		 console.log(id);
		 
	}
	
</script>
<?php 
	require('../logic/connector.php');
	require_once('../php/session.php');
	$user = $_SESSION["username"];
	
	$sql1 = "select * from credentials where username='$user'";
	$rs=$conn->query($sql1);
	if($rs->num_rows>0){
		$row=$rs->fetch_assoc();
		$sender_id = $row['id'];
	}
	
	$sql = "select * from credentials";
	$res=$conn->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			//echo $row['username'];
			?>
			<form method="POST" action="">
				<button type="submit" value="<?php echo $row['id']; ?>" name="id" onclick="load('<?php echo $row['id']; ?>')" >
					<?php echo $row['username']?>
				</button>
			</form>
			<?php
		}
	}
	if(isset($_POST['id'])){
		?>
		<section class="mesopopup" id="mesopopup" >
			<button onclick="load()">Close</button>
			<section class="messo" id="messo" style="width:300px;height:400px;overflow-y:scroll;">
				<?php
				$id = $_POST['id'];
				echo $id;
		
				/*$sql1 = "select username from credentials where id=$id";
				$rs=$conn->query($sql1);
				$row=$rs->fetch_assoc();
				$receiver=$row['username'];*/
	
				$sql2 = "select username from credentials where id=$id";
				$rs=$conn->query($sql2);
				$row=$rs->fetch_assoc();
				$receiver=$row['username'];
				$sql3 ="select * from message where receiver='$user' AND sender='$receiver' OR receiver='$receiver' AND sender='$user'";
				//echo $sql3;
				$res=$conn->query($sql3);
		
				if($res->num_rows>0){
					while($row=$res->fetch_assoc()){
						if($row['receiver'] == $user){
							?>
								<button style="float:left;background:grey;border-radius:10px;width:auto-fit;height:auto;">
									<span><?php echo $row['message'];?></span>
								</button><br><br>
							<?php
						}
						if($row['sender']==$user){
							?>
								<button style="float:right;background:lightgrey;border-radius:10px;width:auto-fit;height:auto;">
									<span><?php echo $row['message'];?></span>
								</button><br><br>
							<?php
						}
					}
				}	
				?>
			</section>
			<form method="POST" action="">
				<input type="text" name="messo">
				<input type="submit">
			</form>
		</section>	
			<?php
	}	
?>
