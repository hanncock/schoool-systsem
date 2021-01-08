<style>
.active {
  
}
.dropdown-content{
	display:none;
}
.dropdown-container{
	display:none;
}
</style>
<div class="menu" id="menu">
	
	<a href="index.php"><button  class="menubtn"><i class="fa fa-tachometer" style="font-size:2.5rem;"></i>Dasboard</button></a>
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-university" style="font-size:2.5rem;"></i>School Setup
		</button>
		<div class="dropdown-container">
			<div class="submenu">
				<a href="addschool.php"><button><i class="fa fa-phone"></i>Create School</button></a>
				<a href=""><button><i class="fa fa-phone"></i>Edit School</button></a>
				<a href=""><button><i class="fa fa-phone"></i>Delete School</button></a>
			</div>
		</div>
	</div>
	
	<div class="dropdown">
		<button  class="dropdown-btn">
			<i class="fa fa-users" style="font-size:2.5rem;"></i>Students
		</button>
		<div class="dropdown-container">
			<div class="submenu">
				<a href="addstudent.php"><button><i class="fa fa-phone"></i>Add Student</button></a>
				<a href="editstudent.php"><button><i class="fa fa-phone"></i>Edit Student</button></a>
			</div>
		</div>
	</div>
	
	<button  class="menubtn">
						<a href=""></span></a>
						<div class="submenu">
								
						</div>
					</button>
	
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