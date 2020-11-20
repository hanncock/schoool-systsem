<html>
	<head>
	<script src="../js/main.js"></script>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script src="../js/main.js"></script>
		
	</head>
	<body onload="refresh2()">
	<script src="../js/main.js"></script>
		<section class="container_all" id="container_all">
			<section class="header" id="header">
				header
			</section>
			<section id="main_display" class="main_display">
				<section id="menu" class="menu">
					<?php include('menu.php');?>
				</section>
				<section class="disp" id="disp">
					<div id="London" class="tabcontent">
						<?php include('dashboard.php') ?>
					</div>
					<div id="Kenya" class="tabcontent">
						<?php include('addschool.php')?>
					</div>
				</section>
			</section>
		</section>
	</body>
	
</html>