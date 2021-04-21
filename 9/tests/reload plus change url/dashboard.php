<style>
.se-pre-con {
	position: relative;
	left: 50px;
	top: 50px;
	width: 50%;
	height: 100%;
	z-index: 9999;
	background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<script >
	function check(){
		if (window.performance) {
		  console.info("window.performance works fine on this browser");
		}
		console.info(performance.navigation.type);
		//document.getElementById("index").style.display="none";
		if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
			document.getElementById("data").style.display="none";
			document.getElementById("frame").src = "dashboard.php";
			document.getElementById("index").style.display="block";
			
			
		  console.info( "This page is reloaded" );
		} else {
			document.getElementById("index").style.display="none";
			document.getElementById("data").style.display="block";
		  console.info( "This page is not reloaded");
		}
		//document.getElementById("menu").style.display="none";
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
	$(window).load(function() {
		$(".se-pre-con").fadeOut();;
	});
</script>
<body onload="check()">
<div class="se-pre-con"> </div>
<div id="index">
	<?php include('index.php')?>
</div>
<div id="data">
<section class="disp">
					<section class="boxes">
						<center><h2>ANALYTICS OVERVIEW</h2></center>
						<section class="boxs">
							<div class="box" style="background:dodgerblue;box-shadow: 2px 10px 10px dodgerblue;">
								<h2>Users</h2>
								<span style="font-size:2.5rem;color:white;">500</span>
								<i class="fa fa-user" style="font-size:6rem;color:brown;padding-left:4rem;opacity:0.5;"></i>
							</div>
							<div class="box" style="background:green;box-shadow:  2px 10px 10px green;">
								<h2>Schools</h2>
								<span style="font-size:2.5rem;color:white;">500</span>
								<i class="fa fa-university" style="font-size:5rem;color:blue;padding-left:4rem;opacity:0.5;"></i>
							</div>
							<div class="box" style="background:#CCCC00;box-shadow:  2px 10px 10px  #CCCC00;">
								<h2>Students</h2>
								<span style="font-size:2.5rem;color:white;">500</span>
								<i class="fa fa-users" style="font-size:5rem;color:brown;padding-left:4rem;opacity:0.5;"></i>
								
							</div>
							<div class="box" style="box-shadow: 2px 10px 10px  grey;" >
								<h2>Errors</h2>
								<span style="font-size:2.5rem;color:grey;">500</span>
								<i class="fa fa-bug" style="font-size:5rem;color:brown;padding-left:4rem;opacity:0.5;"></i>
							</div>
						</section>	
					</section>
					<section class="other">
						<!--img src="../images/features.svg" height="200px" width="100%"-->
						<div id="piechart" style="width: 100%; height: 300px;"></div>
					</section>
				</section>
</div>
</body>