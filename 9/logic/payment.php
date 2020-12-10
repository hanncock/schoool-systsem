<?php 
	require_once('connector.php');
	/*if(isset($_POST['search'])){
		$admno = $_POST['admno'];
		$sql = "SELECT * FROM studentfees where admno=$admno";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "<table>
					<tr style='background:green;color:white;box-shadow:2px 4px 5px green;text-align:center;' >
						<td>Name</td>
						<td>Package</td>
						<td>Amount</td>
					</tr>";
					}
		$sql1 = "SELECT SUM(price) AS count FROM studentfees where admno=$admno";
		$res = $conn->query($sql1);
		$rec = $res->fetch_assoc();
		$total = $rec['count'];
		
		$sql1 = "SELECT SUM(amount) AS count FROM payment where admno=$admno";
		$res = $conn->query($sql1);
		$rec = $res->fetch_assoc();
		$paid = $rec['count'];

				while($row = $result ->fetch_assoc()){
					echo "<tr>";
					$name =$row['name'];
					$admno =$row['admno'];
						echo "<td>". $row['name']. "</td>";
						echo "<td style='background:dodgerblue;'>". $row['package']. "</td>";
						echo "<td>". $row['price']. "</td>";
						echo $total;
					echo "</tr>";
				}
			
	}
		*/
	
	if(isset($_POST['pay'])){
		$name = $_POST['name'];
		$admno = $_POST['admno'];
		$mop = $_POST['mop'];
		$refno = $_POST['refno'];
		$amount = $_POST['amount'];
		
		$sql =  "insert into payment(name,admno,mop,refno,amount)
					values
					('$name','$admno','$mop','$refno','$amount')";
		if($conn->query($sql) === TRUE){
			echo "payment done";
			header("Location:../php/addpayment.php?popup");
		}else{
			echo"not paid";
		}
		/*$sql ="select * from payment where admno=$admno";
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
					echo "<td>". $row['amount']. "</td>";
					$sum = 0;
					$sum += $row['amount'];
				echo "</tr>";
			}
		}*/
	}
		//$total = $paid = 0;
/*	$balance = $total-$paid;
	echo"<table><tr>";
				
				echo "<td style='background:green;box-shadow:2px 4px 5px green;'>Total term Fees:"."<span style='color:white';>".$total."</span></td>";
				echo "<td></td>";
				echo "<td style='background:green;box-shadow:2px 4px 5px green;'>Paid term Fees:"."<span style='color:white';>".$paid."</span></td>";
				echo "<td></td>";
				echo "<td style='background:red;box-shadow:2px 4px 5px green;'>Fee Balance:"."<span style='color:white';>".$balance."</span></td>";
			echo "</table>";*/
?>