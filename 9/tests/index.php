<!--!Doctype = html>
<html>
	<head>
	</head>
	<body>
		<canvas id="myCanvas" width="200" height="100" style="border:1px solid #000000;">
		</canvas>
		<svg width="300" height="200">
  <polygon points="100,10 40,198 190,78 10,78 160,198"style="fill:lime;stroke:purple;stroke-width:5;fill-rule:evenodd;" />
</svg>
	</body>
	<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.moveTo(0, 1);
ctx.lineTo(200, 100);
ctx.stroke();
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.arc(95, 50, 40, 0, 2 * Math.PI);
ctx.stroke();
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

// Create gradient
var grd = ctx.createRadialGradient(75, 50, 5, 90, 60, 100);
grd.addColorStop(0, "red");
grd.addColorStop(1, "white");

// Fill with gradient
ctx.fillStyle = grd;
ctx.fillRect(10, 10, 150, 80);
</script>
</html-->

<script type="text/javascript">
	$(document).ready(function($)
	{
		var page_url = '<?php echo $app_url?>/';

		$(document).on('click', '.btn_load_home', function(event)
		{
			event.preventDefault();

			$(document).attr("title", 'Home');
			$(document).find('meta[name=description]').attr('content', data.description);

			window.history.pushState("", "", page_url);
			$(document).find('.post_msg').html(" ");
		});

		$(document).on('click', '.btn_load_screen', function(event)
		{
			event.preventDefault();

			var call_type = $(this).attr('call_type');

			$.getJSON(page_url+'ajax.php', {call_type: call_type}, function(data, textStatus, xhr)
			{
				console.log(data);

				$(document).attr("title", data.title);
				$(document).find('meta[name=description]').attr('content', data.description);

				$(document).find('.post_msg').html(data.data);

				window.history.pushState("", "", page_url+data.url);
			});
		});


	});
	</script>




<?php 

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $ssl = 'https';
}
else {
  $ssl = 'http';
}

$app_url = ($ssl  )
          . "://".$_SERVER['HTTP_HOST']
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
?>

<!DOCTYPE html>
<html>
<head>

	<title> Change Browser URL Without Refreshing Page  </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="How to change browser URL without refreshing page using jQuery and HTML5.You have seen in many dynamic website when you request new page they dont redirect you to new page they simply change the URL and get that page using Ajax to save time and bandwidth that's what we were going to do in this tutorial ">

	<meta name="author" content="Code With Mark">
	<meta name="authorUrl" content="http://codewithmark.com">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<style type="text/css">
 	body
 	{
    	padding: 0px 0px 0px;
    	background-color: #DAE3E6;
	}
	.content {
    margin-top:auto;
    margin-bottom:auto;
    text-align:center;
	}
 	</style>


	<script type="text/javascript">
	$(document).ready(function($)
	{
		var page_url = '<?php echo $app_url?>/';

		$(document).on('click', '.btn_load_home', function(event)
		{
			event.preventDefault();

			$(document).attr("title", 'Home');
			$(document).find('meta[name=description]').attr('content', data.description);

			window.history.pushState("", "", page_url);
			$(document).find('.post_msg').html(" ");
		});

		$(document).on('click', '.btn_load_screen', function(event)
		{
			event.preventDefault();

			var call_type = $(this).attr('call_type');

			$.getJSON(page_url+'ajax.php', {call_type: call_type}, function(data, textStatus, xhr)
			{
				console.log(data);

				$(document).attr("title", data.title);
				$(document).find('meta[name=description]').attr('content', data.description);

				$(document).find('.post_msg').html(data.data);

				window.history.pushState("", "", page_url+data.url);
			});
		});


	});
	</script>
<script>
menu = document.getElementById('menu');
if (window.performance) {
  console.info("window.performance works fine on this browser");
}
console.info(performance.navigation.type);
if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
	document.getElementById(menu).style.display="none";
  console.info( "This page is reloaded" );
} else {
	document.getElementById('menu').style.display="none";
  console.info( "This page is not reloaded");
}

function myFunction1() {

  document.getElementById("frame").src = "arrtest.php";
}
function myFunction2() {
  
  document.getElementById("frame").src = "index.php";
}
function myFunction3() {
  
  document.getElementById("frame").src = "messo.php";
}
</script>
</head>

<body>
<div id="menu" style="float:left;">
<div class="text-center">

 		<br><br>
 		<h3 > Change Browser URL Without Refreshing Page </h3>

 		<br><br>

 		<span class="btn btn-info btn_load_screen" call_type="home"  onclick="myFunction2()"> Home</span> |<br>
		<span class="btn btn-secondary btn_load_screen" call_type="jquery"  onclick="myFunction1()"> jQuery</span> |<br>
 		<span class="btn btn-dark btn_load_screen" call_type="php"  onclick="myFunction3()"> PHP</span> |<br>
 		<span class="btn btn-success btn_load_screen" call_type="invoice"  onclick="myFunction1()"> Invoice receipt</span> |<br>
 		<br><br>
 	</div>
</div>
<iframe src="messo.php" height="200" width="600" title="Iframe Example" id="frame" style="float:right;">
<div style="padding:10px;"> </div>


<!--[Load Page Content - Start]-->




	<br><br>
 	<span class="post_msg container"></span>
	
 	<br><br>

</div>


<!--[Load Page Content - End]-->


</iframe>
</body>
</html>