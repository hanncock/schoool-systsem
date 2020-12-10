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
$recipient = "shimulicedric@gmail.com";
$subject = "Qoute Request";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?-->
<?php
echo "hello";
	
	
		//echo $j."<br>";
//	}
	//echo $j."<br>";
?>
<form method="post" action="">
<select name="year">
<?php $i= 2000;
	$j = Date('Y');
	for($j=Date('Y'); $j>=$i; $j--){?>
	<option value="<?php echo $j."<br>"; ?>"><?php echo $j."<br>"; ?></option>
<?php }?>
</select>
<input type="submit">
</form>
<?php
	$year = $_POST['year'];
	echo $year;
?>