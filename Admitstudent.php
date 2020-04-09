<!Doctype html>
<html>
<head>
<link href="schoolsystem.css" type="text/css"  rel="stylesheet"/>
 <title>
     SCHOOL SYSTEM
 </title>
</head>
<body >
<div id="Logo">
SCHOOL LOGO N STUFF
</div>
  <div id="menu">
   <ul>
   <H1><a href="HomePage.html">MENU</a></H1>
	 <li>STUDENT MANAGEMENT</li>
	   <ul><a href="Admitstudent.php">Admit new student<a></ul>
	   <ul><a href="StudentList.php">Student List<a></ul>
	 <li>EXAMINATION</li>
	   <ul><a href="Enter Exams.php">Enter Exams</a></ul>
	   <ul>Grading system</ul>
	   <ul>Report</ul><br>
	 <li>FINANCE/ACCOUNTS</li> 
	   <ul>fee statement</ul>
	   <ul>fee charges</ul>
	   <ul>usability</ul>
	   <ul>cash items</ul><br>
	 <li>INVENTORY/STOCK</li>
       <ul>add stock</ul>
	   <ul>sell</ul>
	   <ul>lend</ul>
	   <ul>order</ul><br>
     <li>LIBRARY</li>
       <ul>borrow book</ul>
	   <ul>return book</ul><br>  
   </ul>
   </div>
   <component>
  <div>
<form id="register" action="Admitstudent.php" method="POST" >
 <div id="reg" ><p><b><center>ADMIT NEW STUDENT</center></b></p></div>
<h3><b><center>STUDENT DATA</center></b></h3>
Names:<input type="text"  name="Student_Name">  <img src="1.jpg" id="imgs">
 Form:<select name="form">
    <option> </option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	</select>
Stream:<select name="stream">
    <option> </option>
	<option>North</option>
	<option>South</option>
	<option>West</option>
	<option>East</option>
	</select> 
Addmission No.<input type="text" name="Admission_No"> 
	<br><br>D.O.B:<input type="text" name="dateofbirth">
 
Contacts:<input type="text" name="Student_Contacts"> 

<h3><b><center>PARENT DATA</center></b></h3>
<br><br>
Name: <input type="text" name="name1"> Contacts:<input type="text" name="contact1">	
National I.D<input type="text" name="national1">	<br><br>
Name: <input type="text" name="name2"> Contacts:<input type="text" name="contact2">
National I.D<input type="text" name="national2">			
<br><br><input type="submit" name="register">

</form>
</div>
</component>
<div id="table" width="80%">
<component>
<b><center>STUDENT LIST</center></b>
<?php 
if (isset($_POST['Student_Name'])){
$Student_Name = $_POST['Student_Name'];
$form = $_POST['form'];
$stream = $_POST['stream'];
$dateofbirth = $_POST['dateofbirth'];
$Student_Contacts = $_POST['Student_Contacts'];
$Admission_No = $_POST['Admission_No'];
$name1  = $_POST['name1'];
$contact1 = $_POST['contact1'];
$national1 = $_POST['national1'];
$name2 = $_POST['name2'];
$contact2 = $_POST['contact2'];
$national2 = $_POST['national2'];
	 $host = "127.0.0.1";
	 $dbusername = "root";
	 $dbpassword = "";
	 $dbname = "dbtrial";
	 $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	 if (mysqli_connect_error()){
		 die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	 }else{
	$sql = "insert into student_data(Student_Name,form,stream,dateofbirth,Student_Contacts,Admission_No,name1,contact1,national1,name2,contact2,national2)values('$Student_Name','$form','$stream','$dateofbirth','$Student_Contacts','$Admission_No','$name1','$contact1','$national1','$name2','$contact2','$national2')";
		if($conn->query($sql) === TRUE){
			echo "new record :$Student_Name <br>" ;
		}else{
			echo "Error:";
		}
$sql = "SELECT * FROM student_data";
$result = $conn->query($sql);

echo "<table >
<tr>
<b>
<th>Student</th>
<th>form</th>
<th>stream</th>
<th>Date of Birth</th>
<th>Student_Contacts</th>
<th>Admission_No</th>
<th>Parent 1</th>
<th>Contact</th>
<th>National ID</th>
<th>Parent 2</th>
<th>Contact</th>
<th>National Id</th>
</b>
</tr>";

if ($result->num_rows > 0)  {
    // output data of each row
    while($row = $result->fetch_assoc())  {
       echo "<tr>";
echo "<td>" . $row['Student_Name'] . "</td>";
echo "<td>" . $row['form'] . "</td>";
echo "<td>" . $row['stream'] . "</td>";
echo "<td>" . $row['dateofbirth'] . "</td>";
echo "<td>" . $row['Student_Contacts'] . "</td>";
echo "<td>" . $row['Admission_No'] . "</td>";
echo "<td>" . $row['name1'] . "</td>";
echo "<td>" . $row['contact1'] . "</td>";
echo "<td>" . $row['national1'] . "</td>";
echo "<td>" . $row['name2'] . "</td>";
echo "<td>" . $row['contact2'] . "</td>";
echo "<td>" . $row['national2'] . "</td>";
echo "</tr>";
    }
} else {
	echo "</table";
    echo "0 results";
		$conn->close();
	 }
}
}
?>
</component>
</div>
</body>

</html>