<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<script src="index.js"></script>
		<title>School Site</title>
	</head>
	<body onload="closeNav()">
		<div class="container-all">
			<div ><?php include('head.php'); ?></div>
			<div class="maindisplay">
				<div><?php include('menu.php'); ?></div>
				<div class="display" id="display">
					school list goes here
				</div>
			</div>
		</div>
	</body>
</html>