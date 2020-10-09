<div class="school">
	<section class="form">
		<span class="formtitle"><b><center>Enter Student Details</center></b></span>
		<form method="POST" action="../logic/insert student.php">
			<table>
				<tr class="row">
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
				<tr class="row">
					<td class="name">First Name:</td>
					<td><input type="text" class="input" name="fname"></td>
					<td class="name">Sir Name:</td>
					<td><input type="text" class="input" name="sirname"></td>
					<td class="name">Third Name:</td>
					<td><input type="text" class="input" name="tname"></td>
					<td class="name">Other Name:</td>
					<td><input type="text" class="input" placeholder="not necessary" name="oname"></td>
				</tr>	
				<tr class="row">	
					<td class="name"> D.O.B</td>
					<td><input type="text" class="input" name="dob"></td>
					<td class="name">Gender</td>
					<td><input type="text" class="input" name="gender"></td>
					<td class="name">Admission No:</td>
					<td><input type="text" class="input" name="admno"></td>
					<td class="name">Class:</td>
					<td><input type="text" class="input" name="class"></td>
				</tr>
				<tr class="row">
					
					<td class="name">Stream</td>
					<td><input type="text" class="input" name="stream"></td>
					<td class="name">Email</td>
					<td><input type="text" class="input" name="email"></td>
					<td class="name">Phone No:</td>
					<td><input type="text" class="input" name="phone"></td>
					<td>Photo</td>
					<td><input type="file"></td>
				</tr>
			</table>
			<!--section class="boxes">
			<div>
				<span>
					<label class="name">Name:</label>
					<input type="text" name="input">
				</span>
				<span>
					<label class="name">Address</label>
					<input type="text" name="input">
				</span>
				<span>
					<label class="name">Email</label>
					<input type="text" name="input">
				</span>
				<span>
					<label class="name">Website</label>
					<input type="text" name="input">
				</span>
				<span>
					<label class="name">V.A.T No:</label>
					<input type="text" name="input">
				</span>
			</div>
				
			</section-->
		<input type="submit" value="Add Student" class="submit">
		</form>
	</section>
	<section class="editstudent" >
		<?php include('../logic/editstudent.php') ?> 
	</section>
</div>				