<form action="../logic/student.php" name="student" onsubmit="return validateForm()" class="addschl" method="POST">
						<h2>Add Student</h2>
						<table>
							<tr>
								<td class="label">First Name:</td>
								<td class="inputs"><input type="text" name="fname" ></td>
								<td class="label">Sir Name</td>
								<td class="inputs"><input type="text" name="sirname"></td>
								<td class="label">Third Name</td>
								<td class="inputs"><input type="text" name="tname"></td>
								<td class="label" rowspan="3" style="position:absolute;">
									<img src="../images/avatar.png" style="width:200px;height:180px;top:100px;right:20px;"><br>
									<input type="file" name="studentphoto">
								</td>
							</tr>
							<tr>
								<td class="label">Other Name</td>
								<td class="inputs"><input type="text" name="oname"></td>
								<td class="label">D.O.B</td>
								<td class="inputs"><input type="date" name="dob"></td>
								<td class="label">Gender</td>
								<td class="inputs">
									<select name="gender">
										<option value="">--Sel Gender--</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</td>
								
								
							</tr>
							<tr>
								<td class="label">Admission No</td>
								<td class="inputs"><input type="text" name="admno"></td>
								<td class="label">Class</td>
								<td class="inputs">
									<select name="class">
										<option value="">--select class--</option>
											<?php
												require_once('../logic/connector.php');
												$sql = "select * from class";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['clsname']."'>".$row['clsname']."</option>";
													}
												}	
											?>
									</select>
								</td>
								<td class="label">Stream</td>
								<td class="inputs">
									<select name="stream">
										<option value="">-select Stream-</option>
											<?php
												require_once('../logic/connector.php');
												$sql = "select * from stream";
												$result=$conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo "<option value='".$row['strmname']."'>".$row['strmname']."</option>";
													}
												}	
											?>
									</select>
								</td>
							</tr>
							<tr>	
								<td class="label">Email</td>
								<td class="inputs"><input type="text" name="email"></td>
								<td class="label">Phone No</td>
								<td class="inputs"><input type="text" name="phone"></td>
								<td class="label">County</td>
								<td class="inputs">
									<select name="county">
										<option value="">--Sel County--</option>
										<option value="Kisii">Kisii</option>
										<option value="Nyamira">Nyamira</option>
									</select>
								</td>
							</tr>
						</table>
							<center>
								<input type="submit" name="AddStudent" value="Add Student" style="background:green;height:2.5rem;border-radius:10px;box-shadow:2px 5px 5px #23263C;color:white;font-size:1rem;">
							</center>
					</form>