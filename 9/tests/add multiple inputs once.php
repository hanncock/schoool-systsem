<!--<html>
	<head>
	</head>
	<body>
		<form method="POST" action="">
		<table>
			<tr>
				<th>Degree</th>
				<th>College/Uni</th>
				<th>Passing Year</th>
				<th>Marks Obtained</th>
			</tr>
			<tr>
				<th><input type="text" name="degree[]"></th>
				<th><input type="text" name="university[]"></th>
				<th><input type="text" name="year[]"></th>
				<th><input type="text" name="mobtained[]"></th>
				<th><button type="button" id="addmore"></button></th>
			</tr>
		</table>
		<input type="submit" name="submit" value="submit">
		</form>
	</body>
</html-->
	<form action=""  method="POST">
						<h2>Enter Exam Results</h2>
					<!--section class="schls"-->
						<?php 
							require('../logic/connector.php');
							$sql="select * from student";
							$res=$conn->query($sql);
							if($res->num_rows>0){
								?>
								<table>
									<tr style="background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;" >
										<td>Class</td>
										<td>Admn</td>
										<td>Student Names</td>
										<td>Math</td>
										<td>English</td>
										<td>Kiswahili</td>
										<td>Chemistry</td>
										<td>Physics</td>
										<td>Biology</td>
									</tr>
								<?php
								while ($row=$res->fetch_assoc()){
									echo "<tr>";
										//echo "<td>".$row['class']."</td>";
										$class=$row['class'];
										//echo "<td>".$row['admno']."</td>";
										$admno = $row['admno'];
										$name = $row['fname']." ".$row['sirname']." ".$row['tname']."".$row['othername'];
									//	echo "<td>".$name."</td>";
										
									?>
										<td class="labels"><input type="hidden" name="<?php echo "class[]"; ?>" value="<?php echo $class; ?>"><?php echo $class; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "admno[]"; ?>" value="<?php echo $admno; ?>"><?php echo $admno; ?></td>
										<td class="labels"><input type="hidden" name="<?php echo "names[]"?>" value="<?php echo $name; ?>"><?php echo $name; ?></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "math[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "eng[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "kisw[]"; ?>" ></td>
										<td class="inputs" ><input style="width:80px;"  type="text" name="<?php echo "chem[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "phy[]"; ?>" ></td>
										<td class="inputs" ><input style="width:60px;"  type="text" name="<?php echo "bio[]"; ?>" ></td>
										<?php
									echo "</tr>";
								}
								echo "</tr>";
							}
						?>
							<tr>
								<center>
									<td >
										<input type="submit" name="submit" value="submit">
									</td>
								</center>
							</tr>
						</form>
<?php
//echo "<pre>";
 ($_POST);
$admno = count($_POST['admno']);
echo $admno;
$sql = "insert into `results`(`names`,`admno`,`math`,`eng`,`kisw`,`chem`,`phy`,`bio`)values";
for($i=0; $i<$admno; $i++){
	$sql .="('".$_POST["names"][$i]."','".$_POST["admno"][$i]."','".$_POST["math"][$i]."','".$_POST["eng"][$i]."','".$_POST["kisw"][$i]."','".$_POST["chem"][$i]."','".$_POST["phy"][$i]."','".$_POST["bio"][$i]."'),";
}
//echo $sql;
$finalQuery = rtrim($sql,',');
//mysqli_query($conn,$finalQuery);
if($conn->query($finalQuery) === TRUE){
			echo "exams resgitered";
		}else{
			echo"not exams entered";
		}
//$degree = $j($_POST['degree'])
//print_r($degree);
?> 

