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
			'url' => 'arrtest.php',
			//'data'=>'This is <strong>jQuery</strong> data coming from ajax url'
		));
	}
	else if($call_type == "php")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'PHP Page',
			'description' => 'PHP description',
			'url' => 'messo.php',
			//'data'=>'This is <strong>PHP</strong> data coming from ajax url'
		));
	}
	else if($call_type == "home")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Home Page',
			'description' => 'Home description',
			'url' => 'index.php',
			//'data'=>'This is <strong>Home</strong> data coming from ajax url'
		));
	}
	else if($call_type == "invoice")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Invoice receipt Page',
			'description' => 'Invoice receipt description',
			'url' => 'messo.php',
			//'data'=>file_get_contents('messo.php'),
		));
	}
}
?>