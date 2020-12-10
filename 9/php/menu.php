<section class="menu">
					<div class="userrole">
					<?php
						require_once('session.php');
						echo "welcome <span style='color:yellow'>".$_SESSION["username"]."</span><br>";
						?>
						Role:<span style="color:grey;">Admin</span>
					</div>
					<button  class="menubtn">
						<a href="index.php"><i class="fa fa-tachometer" style="font-size:2.5rem;"></i>Dasboard</span></a>
					</button>
					<button  class="menubtn">
						<a href=""><i class="fa fa-university" style="font-size:2.5rem;"></i>School Setup</span></a>
						<div class="submenu">
							<a href="addschool.php"><i class="fa fa-phone"></i>Create School</span></a><br>
							<a href=""><i class="fa fa-phone"></i>Edit School</span></a><br>
							<a href=""><i class="fa fa-phone"></i>Delete School</span></a><br>
						</div>
					</button>
					<button  class="menubtn">
						<a href=""><i class="fa fa-users" style="font-size:2.5rem;"></i>Students</span></a>
						<div class="submenu">
								<a href="addstudent.php"><i class="fa fa-phone"></i>Add Student</span></a><br>
								<a href="editstudent.php"><i class="fa fa-phone"></i>Edit Student</span></a><br>
						</div>
					</button>
					<button  class="menubtn">
						<a href=""><i class="fa fa-book" style="font-size:2.5rem;"></i>Library</span></a>
						<div class="submenu">
							<a href="registerbook.php"><i class="fa fa-phone"></i>Register Books</span></a><br>
							<a href="issuebook.php"><i class="fa fa-phone"></i>Issue Books</span></a><br>
						</div>
					</button>
					<button  class="menubtn">
						<a href=""><i class="fa fa-usd" style="font-size:2.5rem;"></i>Accounts</span></a>
						<div class="submenu">
							<a href="studentfees.php"><i class="fa fa-phone"></i>Charge Student Fees</span></a><br>
							<a href="addpayment.php"><i class="fa fa-phone"></i>Payment/Receipts</span></a><br>
							<a href="addfeespackage.php"><i class="fa fa-phone"></i>Fees Packages</span></a><br>
						</div>
					</button>
					<button  class="menubtn">
						<a href=""><i class="fa fa-newspaper-o" style="font-size:2.5rem;"></i>Exams</span></a>
						<div class="submenu">
							<a href="addresults.php"><i class="fa fa-phone"></i>Enter Results</span></a><br>
							<a href="processresult.php"><i class="fa fa-phone"></i>Process Results</span></a><br>
							<a href=""><i class="fa fa-phone"></i>Register Subject</span></a><br>
							<a href="addexam.php"><i class="fa fa-phone"></i>Regiser Exam</span></a><br>
						</div>
					</button>
					<button  class="menubtn">
						<a href=""><i class="fa fa-tachometer" style="font-size:2.5rem;"></i>Admin</span></a>
						<div class="submenu">
							<a href="createclass.php"><i class="fa fa-phone"></i>Create Class</span></a><br>
							<a href="Stream.php"><i class="fa fa-phone"></i>Create Stream</span></a><br>
							<a href="addstaff.php"><i class="fa fa-phone"></i>Staff/Employee</span></a><br>
							<a href="transfer.php"><i class="fa fa-phone"></i>Transfers</span></a><br>
							<a href=""><i class="fa fa-phone"></i>Payroll</span></a><br>
						</div>
					</button>
						<button  class="menubtn">
						<a href=""><i class="fa fa-desktop" style="font-size:2.5rem;"></i>E-Learning</span></a>
						<div class="submenu">
							<a href=""><i class="fa fa-phone"></i>Message</span></a><br>
							<a href=""><i class="fa fa-phone"></i>Video</span></a><br>
							<a href=""><i class="fa fa-phone"></i>Download</span></a><br>
							<a href=""><i class="fa fa-phone"></i>Timetable</span></a><br>
						</div>
					</button>
						<button  class="menubtn">
						<a href=""><i class="fa fa-envelope" style="font-size:2.5rem;"></i>Messaging</span></a>
						<div class="submenu">
							<a href="messo.php"><i class="fa fa-newspaper-o" style="font-size:2.5rem;"></i>User Messages</span></a><br>
							<a href=""><i class="fa fa-newspaper-o" style="font-size:2.5rem;"></i>Class Messages</span></a><br>
							<a href=""><i class="fa fa-newspaper-o" style="font-size:2.5rem;"></i>Parent Message</span></a><br>
							<a href=""><i class="fa fa-newspaper-o" style="font-size:2.5rem;"></i>Email</span></a><br>
						</div>
					</button>
					<button  class="menubtn">
						
					</button>
				</section>