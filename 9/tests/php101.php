<!--?php
	$x = 1234;
	$a = 'hello world we begin with php';
	$b = array('1','2','3');
	function test(){
		global $x,$c;
		$c = $x+$x;
	}
	test();
	echo "$a <br>";
	echo "the test function ".$c."<br>";
	//print_r($b)."<br>";
	//count no of values in array
	$d= count($b);
	echo $d;
		//echo (count($b))."<br>";
	//loop in an array
		for($i=0;$i<$d;$i++){
			echo $d[$i]."array loop<br>";
		}
	//shows type of variable
		var_dump($x)."<br>";
	//outputs string lenght
		echo strlen($a)."<br>";
	//outputs word count
		echo str_word_count($a)."<br>";
	//reverse string
		//echo strrev($a)."<br>";
	//find word in string
		echo strpos($a,"we")."<br>";
	//replcae word
		echo str_replace('we', $a,'ass')."<br>";
	//finds min and max value
		echo min($b)."<br>";
		echo max($b)."<br>";
	//find squareroot random number 
		echo sqrt(rand(1,10))."<br>";
	//using the empty 
		$user = '';
		if(empty($user))
		{
			echo "no users selelcted";
		}else
		{
			echo $user;
		}echo "<br>";
		
		
		echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME']."<br>";
echo $_SERVER['REQUEST_TIME']."<br>";
echo $_SERVER['SERVER_PORT'];

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//validate email
$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}


readfile("../db/db tables.txt")."<br>";
?-->
<html>
<body>

<div id="demo">
<h1>The XMLHttpRequest Object</h1>
<button type="button" onclick="()">Change Content</button>
<div id="disp" style="display:"></div>
<div id="pip"></div>
</div>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("disp").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "api101.php", true);
  xhttp.send();
}

var out = new XMLHttpRequest();
out.open("GET", "api101.php", true);
out.send();
var soke = JSON.stringify(document.getElementById('disp').innerHTML=loadDoc());
document.getElementById('pip').innerHTML='welcome',soke[1][1];
</script>

</body>
</html>
