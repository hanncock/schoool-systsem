<style>
.active {
  
}
.menubtn{
	width:100%;
	border:none;
}
.dropdown-content{
	display:none;
	width:100%;
}
.dropdown-container{
	display:none;
	width:80%;
	position:relative;
	float:right;
	text-align:left;
}
.btns{
	width:100%;
	border:none;
}
</style>
<div class="menu" id="menu">

	<div class="userrole">
		<?php
			require_once('session.php');
			echo "welcome <span style='color:yellow'>".$_SESSION["username"]."</span><br>";
		?>
		Role:<span style="color:grey;">Admin</span>
	</div><br><br>
	<a href="logout.php">Logout</a>
	<a href="index.php"><button  class="menubtn"><i class="fa fa-tachometer" style="font-size:2.5rem;"></i>Dasboard</button></a>
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-university" style="font-size:2.5rem;"></i>School Setup
		</button>
		<div class="dropdown-container">
			<a href="addschool.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Create School</button></a>
			<a href=""><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Edit School</button></a>
			<a href=""><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Delete School</button></a>
		</div>
	</div>
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-users" style="font-size:2.5rem;"></i>Students
		</button>
		<div class="dropdown-container">
			<a href="addstudent.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Add Student</button></a>
			<a href="editstudent.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Edit Student</button></a>
		</div>
	</div>
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-book" style="font-size:2.5rem;"></i>Library
		</button>
		<div class="dropdown-container">
			<a href="registerbook.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Register Books</button></a>
			<a href="issuebook.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Issue Books</button></a>
			<a href="returnedbooks.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Returned Books</button></a>
		</div>
	</div>
	
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-usd" style="font-size:2.5rem;"></i>Accounts
		</button>
		<div class="dropdown-container">
			<a href="studentfees.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Charge Student Fees</button></a>
			<a href="addpayment.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Payment/Receipts</button></a>
			<a href="addfeespackage.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Fees Packages</button></a>
			<a href="studentfeestatement.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Student Fee Statement</button></a>
			<a href="weiveredfees.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Weivered fees </button></a>
			<a href="paymenthistory.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Student Payment History </button></a>
			
		</div>
	</div>
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-newspaper-o" style="font-size:2.5rem;"></i>Exams
		</button>
		<div class="dropdown-container">
			<a href="addresults.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Enter Results</button></a>
			<a href="processresult.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Process Results</button></a>
			<a href=""><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Register Subject</button></a>
			<a href="addexam.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Regiser Exam</button></a>
		</div>
	</div>
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-tachometer" style="font-size:2.5rem;"></i>Admin
		</button>
		<div class="dropdown-container">
			<a href="createclass.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Create Class</button></a>
			<a href="Stream.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Create Streams</button></a>
			<a href="addstaff.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Staff/Employee</button></a>
			<a href="transfer.php"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Transfers</button></a>
			<a href="#"><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Payroll</button></a>
		</div>
	</div>
	
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-desktop" style="font-size:2.5rem;"></i>E-Learning
		</button>
		<div class="dropdown-container">
			<a href=""><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Message</button></a>
			<a href=""><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Video</button></a>
			<a href=""><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem;"></i>Download</button></a>
			<a href=""><button class="btns"><i class="fa fa-phone" style="font-size:1.5rem"></i>Timetable</button></a>
		</div>
	</div>
	
		
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-envelope" style="font-size:2.5rem;"></i>Messaging
		</button>
		<div class="dropdown-container">
			<a href="messo.php"><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>User Messages</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Class Messages</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Parent Message</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Send Email</button></a>
		</div>
	</div>	

	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-clipboard" style="font-size:2.5rem;"></i>Stock &amp; Inventory
		</button>
		<div class="dropdown-container">
			<a href="addstock.php"><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Add Item Stock</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Uniform Stock</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Issue Student Uniform</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Issue Staff Uniform</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Issue Teacher</button></a>
		</div>
	</div>	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-clipboard" style="font-size:2.5rem;"></i>Reports
		</button>
		<div class="dropdown-container">
			<a href="addstock.php"><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Student Reports</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Staff Reports</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Accounts &amp;Financial Reports</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Stock Report</button></a>
			<a href=""><button class="btns"><i class="fa fa-newspaper-o" style="font-size:1.5rem;"></i>Clearance</button></a>
		</div>
	</div>
</div>	
<script>
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "block") {
		dropdownContent.style.display = "none";
		} else {
			dropdownContent.style.display = "block";
		}
		});
	}
</script>
<!--section class="menu">
					<div class="userrole">
					<!--?php
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
				</section-->