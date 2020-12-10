<!DOCTYPE html>
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		  <script type="text/javascript">
  function validateForm ()
  {
    if(document.student.fname.value=="")
    {
    alert("please provide the student First Name");
      document.student.fname.focus();
      return false;
    }
	 if(document.student.sirname.value=="")
    {
    alert("please provide the student Second Name");
      document.student.sirname.focus();
      return false;
    }
	 if(document.student.tname.value=="")
    {
    alert("please provide the student Third Name");
      document.student.tname.focus();
      return false;
    }
	 if(document.student.dob.value=="")
    {
    alert("please provide the student Date of Birth");
      document.student.dob.focus();
      return false;
    }
	 if(document.student.gender.value=="")
    {
    alert("please provide the student Gender");
      document.student.gender.focus();
      return false;
    }
	 if(document.student.admno.value=="")
    {
    alert("please provide the student Admisiion No");
      document.student.admno.focus();
      return false;
    }
	 if(document.student.class.value=="")
    {
    alert("please provide the student Class");
      document.student.class.focus();
      return false;
    }
	 if(document.student.stream.value=="")
    {
    alert("please provide the student Stream");
      document.student.stream.focus();
      return false;
    }
	 if(document.student.county.value=="")
    {
    alert("please provide the student county ");
      document.student.county.focus();
      return false;
    }
	
	
    return true;
  }
    </script>
	</head>
	<body>
		<section class="container">
			<?php include 'header.php' ?>
			<section class="display">
				<?php include 'menu.php'?>
				<section class="disp">
					<section class="schls">
								<?php include '../logic/student.php' ?>
					</section>
					<?php
						if(isset($_GET['popup'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Student Has Been Updated Succesfully<br><br><br>
										<a href="editstudent.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
							<?php
						}
					?>
					<?php
						if(isset($_GET['del'])){
							?>
							<section class="popup" name="popup" id="popup">
								<section class="meso">
									<center>
										<img src='../images/sucsess.jpg' style="width:100px;height:100px;"><br><br>
										Student Has Been Deleted Succesfully<br><br><br>
										<a href="editstudent.php">
										<button onload="close()" style="background:dodgerblue;border-radius:10px;width:90px;text-align:center;height:40px;border:none;color:white;">OK</button>
										</a>
									</center>
								</section>
								<div id='hey'>
								</div>
							</section>
							<?php
						}
					?>
				</section>
			</section>
		</section>
	</body>
</html>