<section class="issuebook">
	<form action="" method="POST">
		<table>
			<!--tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr-->
			<tr>
				<td>Class</td>
				<td>Select Subject</td>
				<td>Topic</td>
				<td>Select Assignment</td>
				<td>Due Date</td>
			</tr>
			<tr>
				<td><select name="class">
				<option value="-">-</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select></td>
				<td><select name="subject">
					<option value="-">-</option>
					<option value="Math">Mathematics</option>
					<option value="Eng">English</option>
					<option value="Kisw">Kiswahili</option>
			</select></td>
				<td><input type="text" name="topic"></td>
				<td><input type="file" name="files"></td>
				<td><input type="date" name="date"></td>
			</tr>
		</table>
		<input type="submit" value="Give Assignment" class="submit">
	</form>
</section>
<section>
	assignments given
</section>