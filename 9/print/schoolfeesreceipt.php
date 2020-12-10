<html>
	<head>
		<script type="text/javascript">
			window.onload = function() { window.print(); }
		</script>
	</head>
	<body >
	
	<?php
	require("../logic/connector.php");
	//$refno = $_GET['refno'];
	//echo $refno;
	 if(isset($_GET['ref'])){
		 //echo "hello";
		 $ref = $_GET['ref'];
		 $sql = "select * from payment where refno='$ref'";
		// echo $sql;
		$result = $conn->query($sql);
		$rec = $result->fetch_assoc();
		$name = $rec['name'];
		$admno = $rec['admno'];
		$mop = $rec['mop'];
		$refno = $rec['refno'];
		$amount = $rec['amount'];
		$dat = $rec['created_on'];
		
		$sql1 = "SELECT SUM(price) AS count FROM studentfees where admno=$admno";
		$res = $conn->query($sql1);
		$rec = $res->fetch_assoc();
		$total = $rec['count'];
		
		$sql2 = "SELECT SUM(amount) AS count FROM payment where admno=$admno";
		$res = $conn->query($sql2);
		$rec = $res->fetch_assoc();
		$paid = $rec['count'];
		
		$balance = $total-$paid;
		echo $balance;
	 }
	?>
		<center><img src="../images/logo.png"></center>
		<center><h2>SCHOOL OF SOKE</h2></center>
			<center><table>
				<tr>
					<td></td>
					<td></td>
					<td>Date</td>
					<td><i><?php echo $dat;?></i></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td><b><?php echo $name;?></b></td>
				</tr>
				<tr></tr>
				<tr>
					<td>Amission N<sup>o</sup>:</td>
					<td><?php echo $admno; ?></td>
					<td>Class</td>
					<td>Form 1</td>
				</tr>
				<tr></tr>
				<tr>
					<td>Mode Of Payment</td>
					<td><?php echo $mop;?></td>
					<td>Fees paid</td>
					<td><?php echo $amount ;?></td>
				</tr>
				<tr></tr>
				<tr>
					<td>Balance</td>
					<td><?php echo $balance;?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>Served By</td>
					<td><i>Soke Himselfu</i></td>
				</tr>
			</table></center>
	</body>
</html>	