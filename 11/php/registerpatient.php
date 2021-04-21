<style>
	*{
		font-family:cursive;

	}
	body{
		width:auto;
		box-sizing: border-box;
	}
	.ptndetails{
		background:lightgrey;
		height:auto;
		font-size:1.2rem;
		border-radius:10px;
	}
	center{
		width:auto;
		height:2rem;
		background:dodgerblue;
		border-radius:10px;
		font-size:1.2rem;
		font-weight:bold;
	}
	td{
		font-size:1.1rem;
		height:3rem;
	}
</style>
<section class="ptndetails">
	<center>Patient Details</center>
	<form method="POST" action="">
		<table>
			<tr>
			
				<td>Names</td><td><input type="text" name="ptntname"></td>
				<td>D.O.B</td><td><input type="date" name="dob"></td>
				<td>Age</td><td><input type="age" name="age"></td>
				<td>I.D</td><td><input type="numer" name="idnum"></td>
				<!--td><input type="file" name="image"></td-->
			</tr>
			<tr>
				<td>I.D</td><td><input type="numer" name="idnum"></td>
				<td>Residence</td><td><input type="text" name="residence"></td>
				<td>Phone Number</td><td><input type="int" name="ckrphnnumber"></td>
				<td>Phone Number</td><td><input type="int" name="ckrphnnumber"></td>
			</tr>
			<tr>
				<td>Names</td><td><input type="text" name="ptntname"></td>
				<td>Relationship</td><td><input type="text" name="ptntname"></td>
				<td>I.D</td><td><input type="numer" name="idnum"></td>
			</tr>
		</table>
			<input type="submit" name="Register Patient" value="Register Patient" style="background:seagreen;color:white;">
	</form>
</section>
<section class="insurance">
	<center>Register Patient Insurance</center>
	<form method="POST" action="">
		<table>
			<tr>
				<td>Insurance</td><td><input type="text" name="ptntname"></td>
				<td>Type</td><td><input type="date" name="dob"></td>
				<td>Cover</td><td><input type="age" name="age"></td>
				<td><input type="submit" name="Add Insurance" value="Add Insurance"></td>
			</tr>
		</table>
	</form>
	<div>
		<center>Display Insurance</center>
		<table>
			<tr>
				<td>We have NHIF</td>
			</tr>
		</table>
	</div>
</section>