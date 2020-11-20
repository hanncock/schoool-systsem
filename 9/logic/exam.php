<?php
 require_once('connector.php');

 if(isset($_POST['CreateExam'])){
	$examname =$_POST['examname'];
	$examcode = $_POST['examcode'];
		
	$sql = "insert into exam(examname,examcode)values('$examname','$examcode')";
	if($conn->query($sql) === TRUE){
		echo "exam created";
		//header('Location:../addexam.php');
	}else{
		echo "not created";
	}
	
 }
 
 $sql ="select * from exam ";
 $result = $conn->query($sql);
 if($result->num_rows>0){
	 echo "
		<table>
			<tr style='background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;' >
				<td>#</td>
				<td>Exam Code</td>
				<td>Exam Name</td>
				<td>Created_on</td>
				<td>Clases</td>
				<td></td>
			</tr> ";
	 while($row=$result->fetch_assoc()){
		echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['examcode']."</td>";
			echo "<td>".$row['examname']."</td>";
			echo "<td>".$row['created_on']."</td>";
			?>
			<td>
				<button style="background:green;"><a href="addexam.php?edit=<?php echo $row['id'] ?>" >
					<i class="fa fa-edit"  class="action"></i></a>
				</button>
				<button style="background:red;"><a href="../logic/exam.php?delete=<?php echo $row['id'] ?>">
					<i class="fa fa-trash"  class="action"></i>
				</a></button>
			</td>
	<?php
		echo "</tr>";
	 }
	 echo "</table>";
 }
 
 
?>