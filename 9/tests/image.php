<!Doctype html>
<!--?php
require_once('session.php');
echo "welcome ".$_SESSION["username"]."<br><br>";
?-->
<html>
     <head>
         <title>E-learning</title>
	 </head>
</body>
	<form method="POST" enctype="multipart/form-data" action="image.php">
	<tr>
								<td class="label">Names:</td>
								<td class="inputs"><input type="text" name="names" ></td>
								<td class="label">ID_No.</td>
								<td class="inputs"><input type="text" name="idno"></td>
								<td class="label">Gender</td>
								<td class="inputs">
									<select name="gender">
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
								</select>
								</td>
								<input type="file" name="files"><br><br>
							</tr>
							<tr>
								<td class="label">Marital Status</td>
								<td class="inputs">
									<select name="marital">
										<option value="">--Select Marital--</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Divorced">Divorced</option>
										<option value="Widowed">Widowed</option>
									</select>
								</td>
								<td class="label">D.O.B</td>
								<td class="inputs"><input type="date" name="dob"></td>
								<td class="label">residence</td>
								<td class="inputs"><input type="text" name="residence"></td>
							</tr>
							<tr>	
								<td class="label">Email</td>
								<td class="inputs"><input type="text" name="email"></td>
								<td class="label">Phone No</td>
								<td class="inputs"><input type="text" name="phone"></td>
								<td class="label">County</td>
								<td class="inputs">
									<select name="county">
										<option value="">--Sel County--</option>
										<option value="Kisii">Kisii</option>
										<option value="Nyamira">Nyamira</option>
									</select>
								</td>
							</tr>
	
	<input type="submit" name="submit" value="Assign">
	</form>
	<!--a href='pull from.php'>Download</a-->
<?php
if(isset($_POST['submit'])){
	
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "schlsys";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if($conn->connect_error){
	echo "connection failed";
}
	
	//$image=addslashes($_FILES['files']['tmp_name']);
	//$imagename=addslashes($_FILES['files']['name']);
	//$image=file_get_contents($image);
	//$image=base64_encode($image);
	$image = $_FILES['files']['name'];
	//$imagename=$_FILES['files']['name'];
	$target = "../files/".$image;

$sql= "insert into staff(path)values('$target')";

if (move_uploaded_file($_FILES['files']['tmp_name'], $target)) {
  		$msg = "File uploaded successfully";
  	}else{
  		$msg = "Failed to upload file";
  	}
if($conn->query($sql) === TRUE){
			echo "assignment given"."<br>" ;
		}else{
			echo "Error in submitting";
		}
			
}
$sql1="select * from staff";
$result=$conn->query($sql1);
	if ($result->num_rows > 0) {
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
			$pic = $row['path'];
			echo "<td><img src='$pic' style='width:100px;height:100px;'></td>";
	}
	}
?>
</body>
</html>