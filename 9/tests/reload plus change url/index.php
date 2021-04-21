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

	<title> School Sys </title>

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
	.btn{
		
	}
	*::-webkit-scrollbar {
    display: none;
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
	document.getElementById(menu).style.display="block";
  console.info( "This page is reloaded" );
} else {
	document.getElementById('menu').style.display="none";
  console.info( "This page is not reloaded");
}

function myFunction1() {

  document.getElementById("frame").src = "index.php";
}
function myFunction2() {
  
  document.getElementById("frame").src = "addstudent.php";
}
function myFunction3() {
  
  document.getElementById("frame").src = "dashboard.php";
}
</script>
</head>

<body >
<?php include('menu.php');?>
<iframe src="#" height="700" width="80%" title="Iframe Example" id="frame" style="float:right;border:none;"></iframe>
</body>
</html>