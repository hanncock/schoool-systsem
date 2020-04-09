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
   <div id="table">
   <b><center>STUDENT LIST</center></b>
   <?php
$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "dbtrial";
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM student_data";
$result = $conn->query($sql);
echo "<table  >
<tr>
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
</tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
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
	echo "</table>";
    echo "0 results";
	
}
$conn->close();



?>
   </div>
   </copmponent>
</body>
</html>