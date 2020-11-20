<!--?php
	$to=$_POST['hanncock98@gmail.com'];
	$from=$_POST['hanncock98@gmail.com'];
	$message=$_POST['soke trial'];
	mail($to,$from,$message)or die("Error");
?-->
<!--?php 
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$quantity = $_POST['quantity'];
$weight = $_POST['weight'];
$from = $_POST['from'];
$to = $_POST['to'];
$formcontent="From: $first_name \n Phone Number: $phone \n ";
$recipient = "hanncock98@gmail.com";
$subject = "Qoute Request";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?-->
<!--html>
	<head>
	</head>
	<body>
		<form metod="POST" action='https://fairmontsinternationalschool.co.ke/php/mail.php'></form>
		email<input type="text" name="email">
From		<input type="text" name="from">
	to<input type="text" name="to">	
	<input type="submit">
	</body>
</html-->
<!DOCTYPE html>
<html>
<head>
<title>PHP: Get Values of Multiple Checked Checkboxes</title>
<link rel="stylesheet" href="css/php_checkbox.css" />
</head>
<body>
<div class="container">
<div class="main">
<h2>PHP: Get Values of Multiple Checked Checkboxes</h2>
<form action="php_checkbox.php" method="post">
<label class="heading">Select Your Technical Exposure:</label>
<input type="checkbox" name="check_list[]" value="C/C++"><label>C/C++</label>
<input type="checkbox" name="check_list[]" value="Java"><label>Java</label>
<input type="checkbox" name="check_list[]" value="PHP"><label>PHP</label>
<input type="checkbox" name="check_list[]" value="HTML/CSS"><label>HTML/CSS</label>
<input type="checkbox" name="check_list[]" value="UNIX/LINUX"><label>UNIX/LINUX</label>
<input type="submit" name="submit" Value="Submit"/>
<!----- Including PHP Script ----->
<?php include 'checkbox_value.php';?>
</form>
</div>
</div>
</body>
</html>