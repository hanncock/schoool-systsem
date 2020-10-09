<section class="adduser">
	<form method="POST" action="adduser.php">
		<table>
			<tr>
				<td>username</td>
				<td>password</td>
				<td>ID_No</td>
				<td>Gender</td>
				<td>Image</td>
			</tr>
			<tr>
				<td><input type="text" name="username"></td>
				<td><input type="text" name="password"></td>
				<td><input type="text" name="ID_No"></td>
				<td><input type="text" name="gender"></td>
				<td rowspan="2"><input type="file" name="photo"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>Address</td>
				<td>Email</td>
				<td>Marital Status</td>
			</tr>
			<tr>
				<td><input type="text" name="phone"></td>
				<td><input type="text" name="address"></td>
				<td><input type="text" name="email"></td>
				<td><input type="text" name="marital"></td>
			</tr>
		</table>
		<input type="submit" value="Create User" class="submit">
	</form>

<?php
require_once('connector.php');

if (isset($_POST['ID_No'])){
	$ID_No = $_POST['ID_No'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$marital = $_POST ['marital'];

$conn =new mysqli($host,$dbusername,$dbpassword,$dbname);

if($conn->connect_error){
	echo "no connection";
}
$sql= "insert into Account(ID_No,username,password,phone,gender,adress,email,marital)
			values
	('$ID_No','$username','$password','$phone','$gender','$address','$email','$marital')";

if($conn->query($sql)===TRUE){
	echo"Account succesfully created";
}else{
	echo"account not created";
}
}
?>
</section>
<div>
	<?php include('employeelist.php') ?> 
</div>


