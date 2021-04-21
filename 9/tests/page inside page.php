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


</head>
<body>

<h2>HTML Iframes</h2>
<div style="float:left">
<button  onclick="myFunction1()"  call_type="home">Buton 1</button><br>
<button  onclick="myFunction2()" call_type="jquery">Buton 2</button><br>
<button  onclick="myFunction3()" call_type="php">Buton 3</button><br>

<div id="demo"></div>
</div>
<div style="float:center">
	<iframe src="messo.php" height="200" width="800" title="Iframe Example" id="frame"></iframe>
</div>
</body>
<script>

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
</html>
<?php



if(isset($_GET['call_type']))
{
	$call_type = $_GET['call_type'];

	if($call_type == "jquery")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'jQuery Page',
			'description' => 'jQuery description',
			'url' => 'jquery/'.$call_type.'.php',
			'data'=>'This is <strong>jQuery</strong> data coming from ajax url'
		));
	}
	else if($call_type == "php")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'PHP Page',
			'description' => 'PHP description',
			'url' => 'php/'.$call_type.'..php',
			'data'=>'This is <strong>PHP</strong> data coming from ajax url'
		));
	}
	else if($call_type == "home")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Home Page',
			'description' => 'Home description',
			'url' => '',
			'data'=>'This is <strong>Home</strong> data coming from ajax url'
		));
	}
	else if($call_type == "invoice")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Invoice receipt Page',
			'description' => 'Invoice receipt description',
			'url' => '/messo.php',
			'data'=>file_get_contents('messo.php'),
		));
	}
}
?>
