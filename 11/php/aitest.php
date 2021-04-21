<!DOCTYPE html>
<html>
	<head>
		<script>
			/*function check(){
				var x = document.getElementById('word').value;
				document.getElementById('disp').innerHTML = x;
			}*/
		
			function showHint(str) {
				var x  = document.getElementById("word").value;
				//document.getElementById("disp").innerHTML = x;
				if (str.length == 0) {
					 document.getElementById("word").innerHTML = "";
					// document.getElementById('disp').innerHTML = x;
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						 document.getElementById("txtHint").innerHTML = this.responseText;
						 document.getElementById("price").value=document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "searchdb.php?word=" + str, true);
				xmlhttp.send();
				}
			}
		</script>
		<style>
		*{
			margin:0;
		}
		 body{
			 background: #F1F1F1;
		 }
		
		 .disp{
			 margin-top:2rem;
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			width: 500px;
			justify-content:center;
		}
		.disp>*:first-child {
			align-self: stretch;
		}
		 .outline{
			 min-width:500px;
			 margin-top:2.3rem;
		 }
		 p{
			 font-size:3rem;
			 min-width:500px;
			 height:300px;
			 background:white;
		 }
		  .textarea{
			 background:white;
			 font-size:1.5rem;
			 min-width:500px;
			 height:300px;
			 border:none;
		 }
		 .btn{
			 min-width:400px;
			 height:4rem;
			 background:lightgreen;
			 font-family:poppins;
			 font-size:2rem;
			 color:purple;
			 border-radius:10px;
		 }
		 .logo{
			 height:3rem;
			 font-size:2rem;
			 background:white;
		 }
		 .menu{
			 height:3rem;
			 font-size:2rem;
			 background:blue;
		 }
		 .dis{
			 display:flex;
		 }
		</style>
	</head>
	<body>
		
		<div class="logo">
			<img src="nbsp;">
			LangTrans
		</div>
		<div class="disp">
			<div class="menu">
				my menu
			</div>
			<section class="dis">
			<form method="POST" >
				<!--center><h1>Translate to </h2></center-->
				<input type="text" class="textarea" name="words" id="word" onkeyup="showHint(this.value)"><br>
				<!--input type="submit" name="translate" class="btn" value="translate"-->
			</form>
		
			<div class="outline">
				<p><span id="txtHint"></span></p>
				<input type="hidden" name="price" id="price">
			</div>
		</section>
		</div>
		<?php
		$host = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbname = "words";
		$conn = new mysqli($host, $username, $password, $dbname); 
		
		if(isset($_POST['translate']) AND ($_POST['words'] != ' ' || "") ){
			$meso = $_POST['words'];
			if($meso == '' || ' '){
				echo "enter text";
			}
			
			
			$sql = "select keyrep,correspondent from words where keyrep=$meso";
			//echo $sql;
			$res = $conn->query($sql);
			if($res -> num_rows >0 ){
				while($row = $res->fetch_assoc()){
					echo $row['correspondent'];
				}
				
			}
		}	
			$word = array(
					"1" => "eyemo",
					"2" => "ibere",
					"morning" => "mambi"
				);
			if(isset($_POST['translate'])){
				$meso = $_POST['words'];
				
				
				if(array_key_exists($meso,$word)){
					print_r($word[$meso]);
				}else{
					echo "<br>Didn't find the translation for $meso ,please enter the response";
					?>
					<form method="POST">
						<input type="text" name="corrwords">
						<input type="hidden" name="actualword" value="<?php echo $meso;?>" focus><?php echo $meso?>	
					<input type="submit" name="save">
					</form>
					<?php
				}

			}
			
			if(isset($_POST['save'])){
				$meso = $_POST['actualword'];
				$altered = $_POST['corrwords'];
				//$word[$meso] = $altered;
				
				$sql = "insert into words(keyrep,correspondent)VALUES('$meso','$altered')";
				//echo $sql;
				if($conn->query($sql) == TRUE){
					echo "words added";
				}else{
					echo "please try again later";
				}
				//array_push($word, $altered);
				//print_r($word);
			}
		
		?>
	<body>
</html>