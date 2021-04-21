<style>
.profile{
	display:none;
}
.view{
	display:block;
	float:right;
	position:absolute;
	background:yellow;
	width:200px;
	height:50px;
	font:40px;
	text-decoration:none;
	text-align:center;
}
.btnprof{
	width:1rem;
	border-radius:50%;
}
</style>
<script>
function preview(){
	console.log('welcome');
	var prof =document.getElementById('profile');
	prof.classList.toggle("view");
}
</script>
<section class="header">
				<img src="../images/logo.png" class="logo">
				<form action="" method="POST" class="search">
					<input type="text" name="search" placeholder="Search..." class="srchtxt">
					<button type="submit" class="srchbtn"><i class="fa fa-search"></i></button>
				</form>	
				<span class="icons">
					<i class="fa fa-envelope"></i>
					<i class="fa fa-phone"></i>
					<i class="fa fa-phone"></i>
					<i class="fa fa-phone"></i>
				</span>
				<span class="user">
					<button  class="" onclick="preview()">
						<img src="../images/avatar.png" class="userimg">
					</button> <br>
				<span>
				<section class="profile" id="profile" >
					<a href="Login.php">Logout</a><br>
					<a href="">Profile</a><br>
					
				</section>
			</section>