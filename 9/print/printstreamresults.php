<html>
	<head>
		<script type="text/javascript">
			window.onload = function() { window.print(); }
		</script>
	</head>
	<body >
	
	<?php
	require("../logic/connector.php");
	 if(isset($_GET['examname'])){
		 $class = $_GET['class'];
		 $examname = $_GET['examname'];
		 $stream = $_GET['stream'];
		 $year = $_GET['year'];
		 $sql = "SELECT admno,names,math,eng,kisw,chem,phy,bio, SUM(math+eng+kisw+chem+phy+bio) as marks FROM results WHERE examname='$examname' AND class='$class' AND year='$year' AND stream='$stream' GROUP BY names ORDER BY marks DESC;";
		 $res=$conn->query($sql);	
		?>
			<center>
			<img src="../images/logo.png">
			<h2>SCHOOL OF SOKE</h2>
			<h2><?php echo $class." ".$stream; ?>Exam Results</h2>
			<table>
				<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
										<!--td>#</td-->
										<td>admno</td>
										<td>Student Name</td>
										<!--td>Class/Grade</td-->
										<td>Math</td>
										<td>Eng</td>
										<td>Kisw</td>
										<td>Chem</td>
										<td>Phy</td>
										<td>Bio</td>
										<td>Total Marks</td>
									</tr>
									<?php
										while($row=$res->fetch_assoc()){
											echo "<tr>";
												//echo "<td>".$row['id']."</td>";
												echo "<td>".$row['admno']."</td>";
												echo "<td>".$row['names']."</td>";
												echo "<td>".$row['math']."</td>";
												echo "<td>".$row['eng']."</td>";
												echo "<td>".$row['kisw']."</td>";
												echo "<td>".$row['chem']."</td>";
												echo "<td>".$row['phy']."</td>";
												echo "<td>".$row['bio']."</td>";
												echo "<td>".$row['marks']."</td>";
											echo "</tr>";
										}
									?>
								</table>
							
										<?php
							}
						?>
						</center>
	</body>
</html>	