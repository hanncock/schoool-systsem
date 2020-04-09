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
<component id="menu">
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
   </component>
   <component>
  <div id="Exam_entry">
    <?php
     $host = "127.0.0.1";
     $dbusername = "root";
	 $dbpassword = "";
	 $dbname = "dbtrial";
	 
	 $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	 
	  if (mysqli_connect_error()){
		 die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	 }else{
	$sql = "Select Student_Name from Student_Data" ;
       $result = $conn->query($sql);
	   //$name =$result->fetch_assoc();
	 echo  "<form method='POST' action='Enter Exams.php'>";
	   
	   echo "<table >
<tr>
<b>
<th>Student Name</th>
<th>Math</th>
<th>English</th> 
<th>Kiswahili</th> 
<th>Science</th> 
</tr> ";
	   if (($result->num_rows > 0)) {
    // output data of each row
    while(($row = $result->fetch_assoc())) {   
	       echo "<tr>";
echo "<td>" .$row['Student_Name']  . "</td>";	   
echo "<td> <input type='text' name='Math'> </td>";
echo "<td> <input type='text' name='English'> </td>";
echo "<td> <input type='text' name='Kiswahili'> </td>";
echo "<td> <input type='text' name='Science'> </td>";
echo "</tr>";
}
 echo "</table>";
 $name = ('Student_Name');
 echo "<input type='submit' value='submit'>";
 echo "</form>";
	   }
	  
	 }
/*  </component>
   <component>
   <div id="table">*/
  $Student_Name  =$row->fetch_assoc();
   if (isset($_POST['Math'])){
	   $Math = $_POST['Math'];
	   $English = $_POST['English'];
	   $Kiswahili = $_POST['Kiswahili'];
	   $Science = $_POST['Science'];
	  $Student_Name = $_POST['Student_Name'];
	  /* $host = "127.0.0.1";
	 $dbusername = "root";
	 $dbpassword = "";
	 $dbname = "dbtrial";*/
	 $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	 $sql1 = new mysqli($host,$dbusername,$dbpassword,$dbname);
	 if (mysqli_connect_error()){
		 die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	 }else{
	$sql = "insert into Exams(Math,English,Kiswahili,Science,Student_Name)values('$Math','$English','$Kiswahili','$Science','$Student_name')";
		if($conn->query($sql) === TRUE){
				echo "<font  color='green'>new record:</font>";
		}else{
			echo "Error:";
		}
	 $sql = "SELECT * FROM Exams" ;
	  $result = $conn->query($sql);
	 $sql1 = "Select * from Student_Data" ;
       $result1 = $conn->query($sql1);
	 echo "<table  width=60% >
	 <font color='blue'>
<tr>
<th>Student Name</th>
<th>Math</th>
<th>English</th>
<th>Kiswahili</th>
<th>Science</th>
</tr>
</font>";

if (($result->num_rows > 0)&  ($result1->num_rows > 0)) {
    // output data of each row
    while(($row = $result->fetch_assoc()) & ($row1 = $result1->fetch_assoc())){
       echo "<tr>";   
echo "<td>" . $row1['Student_Name'] . "</td>";	   
echo "<td>" . $row['Math'] . "</td>";
echo "<td>" . $row['English'] . "</td>";
echo "<td>" . $row['Kiswahili'] . "</td>";
echo "<td>" . $row['Science'] . "</td>";

echo "</tr>";
    }
} else {
	echo "</table>";
    echo "0 results";
	
}
if($conn->query($sql1) === TRUE){
			echo "$Student_Name";
		}
$conn->close();
   }
   }
   ?>
   </component>
</body>
</html>