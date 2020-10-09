<div class="school">
	<section class="form">
		<span class="formtitle"><b><center>Enter school Details</center></b></span>
		<form method="POST" action="../logic/insert school.php">
			<table>
				<tr class="row">
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
				<tr class="row">
					<td class="name">School Name</td>
					<td><input type="text" class="input" name="schlname"></td>
					<td class="name">School Address</td>
					<td><input type="text" class="input" name="schladdress"></td>
					<td class="name">School Map Location</td>
					<td><input type="text" class="input" name="schllocation"></td>
				</tr>
				<tr class="row">
					<td class="name">School V.A.T No:</td>
					<td><input type="text" class="input" name="schlvat"></td>
					<td class="name">School M.o.Health No:</td>
					<td><input type="text" class="input" name="schlhealth"></td>
					<td class="name">School Website</td>
					<td><input type="text" class="input" name="schlwebsite"></td>
				</tr>
				<tr class="row">
					<td class="name">Email</td>
					<td><input type="text" class="input" name="schlemail"></td>
					<td class="name">Phone No:</td>
					<td><input type="text" class="input" name="schlphone"></td>
					<td>Logo</td>
					<td><input type="file" name="schllogo"></td>
				</tr>
			</table>
		<input type="submit" value="Create School" class="submit">
		</form>
	</section>
</div>				