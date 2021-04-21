<!DOCTYPE html>
<html>
<head>
<script>
menu = document.getElementById('menu');
if (window.performance) {
  console.info("window.performance works fine on this browser");
}
console.info(performance.navigation.type);
if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
	//document.getElementById(menu).style.display="none";
  console.info( "This page is reloaded" );
 // document.getElementById("myDIV").style.display = "none";
} else {
	//document.getElementById('menu').style.display="none";
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
function check(){
	console.log('loadede');
	document.getElementById("myDIV").style.display = "none";
	if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
		console.info( "This page is reloaded" );
		document.getElementById("myDIV").style.display = "block";
}else{
	document.getElementById("myDIV").style.display = "none";
}
}
</script>
</head>
<body onload="check()">
<div class="menu"  id="myDIV" style="float:left;">
<div class="text-center">

 		<h3 > Change Browser URL Without Refreshing Page </h3>

 		<br><br>

 		<span class="btn btn-info btn_load_screen" call_type="home"  onclick="myFunction1()"> Home</span> |
		<span class="btn btn-secondary btn_load_screen" call_type="jquery"  onclick="myFunction2()"> jQuery</span> |
 		<span class="btn btn-dark btn_load_screen" call_type="php"  onclick="myFunction3()"> PHP</span> |
 		<span class="btn btn-success btn_load_screen" call_type="invoice"  onclick="myFunction1()"> Invoice receipt</span> |
 		<br><br>
 	</div>
</div>

<?php
	$host = '127.0.0.1';
	$username = 'root';
	$password = '';
	$dbname = "schlsys";
	$conn = new mysqli($host,$username,$password,$dbname);
	
	$sql = 'select phone from student';
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$arr[] = $row['phone'];
		}
	}
	foreach($arr as $value){
		$code = "+254";
		$end = "@c.us";
		$value = $code.$value.$end ;
		global $v ;
		$v[]= $value;
	}
	//print_r( $v);
	//$varr = $value;
	$out = fopen('php://output', 'w');
	fputcsv($out, $v);
	fclose($out);
?>
</body>