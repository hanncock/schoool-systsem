<section class="addbook">
	<form method="POST" action="">
		<table>
			<tr>
				<td>Book Name:</td>
				<td>Category</td>
				<td>No. of Copies</td>
				<td>Author</td>
				<td>Book Code</td>
			</tr>
			<tr>
				<td><input type="text" name="book name"></td>
				<td><input type="text" name="bookcategory"></td>
				<td><input type="text" name="bookcopies"></td>
				<td><input type="text" name="author"></td>
				<td><input type="text" name="bookcode"></td>
			</tr>
		</table>
		<input type="submit" value="Add Book" class="submit">
	</form>
	<div>
		existing  books list
	</div>
<?php
if (isset($_POST['username'])){
$username = $_POST['username'];
$password = $_POST['password'];
$ID_No = $_POST['ID_No'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];


$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "car";

$conn =new mysqli($host,$dbusername,$dbpassword,$dbname);

if($conn->connect_error){
	echo "no connection";
}
$sql= "insert into Account(username,password,ID_No,phone,address,email)values('$username','$password','$ID_No','$phone','$address','$email')";

if($conn->query($sql)===TRUE){
	//header("Location:Login cl.php");
}else{
	echo"account not created";
}
}
?>
</section>


