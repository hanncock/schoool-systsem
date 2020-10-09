<!--?php 
//echo "welcome";
//	try{
		//$ip=$_GET['ip'];
		$url = 'http://localhost/SchoolSystem/9/tests/api101.php';
		$response = file_get_contents($url);
		//$json_array=json_decode($response,true);
		//echo $response[0];
		$soke = array($response);
		echo $soke[0];

		//echo $response;
		//echo $response.'id';
	
	//}
?-->
<!--?php
$url = 'http://localhost/SchoolSystem/9/tests/api101.php';
$client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);
 
  echo "<table>";
 echo "<tr><td>Amount:</td><td>$result->amount</td></tr>";
 echo "<tr><td>Response Code:</td><td>$result->response_code</td></tr>";
 echo "<tr><td>Response Desc:</td><td>$result->response_desc</td></tr>";
 echo "</table>";
?-->
<!--?php
	$url = 'http://localhost/SchoolSystem/9/tests/api101.php';
	$response = file_get_contents($url);
	$data=array(json_decode($response,true));
	echo $data[0];
	//$post = new Post($conn);
	//$map = $data['amount'];
	//echo $map;
	//$post->id = $data->amount;
?-->
<!--?php
	$url = 'http://localhost/SchoolSystem/9/tests/api101.php';
		$response = file_get_contents($url);
		$json_array=json_decode($response,true);
		echo $response[0];
		$soke = array($response);
echo json_encode($soke);
		//echo $response;
		//echo $response.'id';

?-->
<!--?php
	require_once('../logic/connector.php');
	$url = 'http://localhost/SchoolSystem/9/tests/api101.php';
	//$curl = curl_init($url . '?' . http_build_query($sql));
	//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$response = json_decode($url, true);
  //curl_close($curl);
  echo $response;
  $news = $response['value'];
  echo $news;
  /* foreach ($news as $post) {
             echo '<h3>' . $post['title'] . '</h3>';
             echo '<a href="' . $post['url'] . '">Source</a>';
             echo '<p>Date Published: ' . $post['datePublished'] . '</p>';
             echo '<p>' . $post['body'] .'</p>';
             echo '<hr>';
          }*/
?-->
<!--?php
	$url = 'http://localhost/SchoolSystem/9/tests/api101.php';
	$response = file_get_contents($url);
	$dat = json_decode($ro,true);
	
	print $dat[0]["id"];
	//echo $response;
	//print $response["admno"];
	//$ro =  json_encode($response);
//print $ro;
//$dat = json_decode($ro);
//$dat = json_decode($ro,true);
	
	//print $dat[0];
	//$data = json_decode($response,true);
//	print $data;
//	print $data[0]["id"];//print_r($data['Results']);
//	echo $data['Results'];
	//$news = $data['Results'];
	//echo $news;
	/*foreach ($data as $post) {
             echo '<h3>' . $post['title'] . '</h3>';
	}//print_r(array_values($data));*/
?-->
<!--?php
include('api101.php');
echo $ro;
$dat = json_decode($ro,true);
	
	print $dat[0]["admno"];
?-->
<?php 
	$url ='http://localhost/SchoolSystem/9/tests/api101.php';
	print $url."<br>";
	$response = file_get_contents($url);
	print $response."<br>";
	$data = json_decode($url);
	print $data."<br>";
	print $data[0]["id"];
?>