<?php
require_once('../logic/connector.php');
/*$sql = "SELECT * FROM studentfees where admno=1236";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "<table>
					<tr>
						<td>Name</td>
						<td>Amnount</td>
					</tr>";
				while($row = $result ->fetch_assoc()){
					echo "<tr>";
					$name =$row['name'];
					$admno =$row['admno'];
						echo "<td>". $row['name']. "</td>";
						echo "<td>". $row['price']. "</td>";
						$sum = 0;
						$sum += $row['price'];
				
					echo "</tr>";
				}
					echo"total:".$sum;
		}
$sql ="select * from payment where admno=1236";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			echo "<table>
					<tr>
						<td>Name</td>
						<td></td>
					</tr>";
			while($row=$result->fetch_assoc()){
				echo "<tr>";
					echo "<td>". $row['name']."</td>";
					echo "<td>". $row['admno']."</td>";
					echo "<td>". $row['mop']."</td>";
					echo "<td>". $row['refno']."</td>";
					echo "<td>". $row['amnt']. "</td>";
					$sum = 0;
					$sum += $row['amnt'];
				echo "</tr>";
			}
			echo "paid".$sum;
		}*/
		$sql ="select * FROM payment where admno=1236;";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$sum=0;
			while($row = $result ->fetch_assoc()){
				echo $row['name'];
			}
			echo $sum;
		}
		$sql = "SELECT SUM(amnt) AS count 
        FROM payment where admno=1236";

$res = $conn->query($sql);
$rec = $res->fetch_assoc();
$total = $rec['count'];

echo "Total: " . $total . "\n";
	?>	