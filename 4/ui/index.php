<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<script src="index.js"></script>
		<title>1234</title>
	</head>
	<body onload="openNav()">
		<div class="wrapper">
			<div class="head">
				<?php include('menu.php'); ?>
			</div>	
			<div class="disp" id="disp">
				<div class="heading">
					<span id="closebtn" class="closebtn" style="font-size:20px;cursor:pointer;padding-left:30px;font-size:25px " onclick="closeNav()" >&times;</span>
					<span id="openbtn" style="font-size:20px;cursor:pointer;padding-left:30px;font-size:25px " onclick="openNav()">&#9776;</span>
				</div>
				<?php include('dash.php');?>
			</div>
		</div>
	</body>
</html>
<!--script>
function closeNav(){
document.getElementById('menu').style.display="none";
document.getElementById('menu2').style.display = "block";
document.getElementById('closebtn').style.display= "none";
}	

function openNav(){
document.getElementById('menu').style.display="block";
document.getElementById('menu2').style.display = "none";
document.getElementById('closebtn').style.display= "block";
}
</script-->