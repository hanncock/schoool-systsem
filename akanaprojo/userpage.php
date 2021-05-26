<?php
	require('session.php');
?>
<html>
	<head>
		<script>
			function viewcomments(){
				var div = document.getElementById('comments');
				if(div.style.display == 'none') {
					div.style.display = 'block';
				} else {
					div.style.display = 'none';
				}
			}
			function capturequestion(str){
			
			 var xhr = new XMLHttpRequest();
			   	var comment = document.getElementById('commentsmade'+ str).value;
			   
				//console.log(str, comment);
				xhr.open('POST', 'all.php', true);
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhr.onload = function () {
					// do something to response
					console.log(this.responseText);
				};
				xhr.send('message=' + comment, 'question=' + str);
				console.log(comment, str);
				document.getElementById('commentsmade' + str).focus();
				document.getElementById('commentsmade' + str).innerHTML=" ";
				
			}
			
			function capture2(str){
				var str = document.getElementById('commentsmade'+str).value;
				if (str.length == 0) {
					 document.getElementById("commentsmade"+str).innerHTML = "";
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						 document.getElementById("commentsseen").innerHTML += this.responseText;
						 document.getElementById("commentsseen").value +=document.getElementById("commentsseen").innerHTML += this.responseText;
						 console.log('sent');
					}
				};
				xmlhttp.open("GET", "all.php?question=" + str, true);
				xmlhttp.send();
				document.getElementById('commentsmade' + str).focus();
				document.getElementById('commentsmade' + str).innerHTML=" ";
				}
			}
		</script>
		<style>
			.comments{
				display:block;
			}
			.show{
				display:block;
			}
			.btns{
				height:2rem;
			}
		</style>
	</head>
	<body>
		<div class="header">
			<?php 
				$username = $_SESSION['username'];
				echo "welcome\t".$_SESSION['username'];
			?>
			<a href="Logout.php">Logout</a>
		</div>
		<section>
			<div id="question" class="question">
				<?php
				$sql = "select * from questions ";
				$res = $conn-> query($sql);
				if($res->num_rows>0){
					while($row=$res->fetch_assoc()){
						?>
						<div>
						<button onclick='viewcomments()' class='btns'><?php echo $row['question'];?></button><br>
					
						<input type="text" name="commentsmade" placeholder="enter comment" id="commentsmade<?php echo $row['question'];?>">
						<input type="submit" name="send" value="<?php echo $row['question'];?>" onclick="capture2('<?php echo $row['question'];?>')">
						
						<?php	
					}
				}
				?>
			</div>
				<div id="commentsseen">
					
				</div>
		</section>
	</body>
	<script>
	
	<script>
	var imagee = document.getElementById('profile');
	imagee.addEventListener('click', function(){
		console.log('welcome');
	})
</script>
</script>
</html>