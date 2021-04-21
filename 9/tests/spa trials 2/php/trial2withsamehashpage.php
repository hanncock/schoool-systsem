<!DOCTYPE html>
<html>
	<head>
		<script>
			function check(){
				if (window.performance) {
					 console.info("window.performance works fine on this browser");
				}
				//console.info(performance.navigation.type);
				if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
					console.info( "This page is reloaded" );
					var val = window.location.href;
					var foundString = val.substr(val.indexOf('#')+1,);
					var str1 = ".php";
					var output  = foundString.concat(str1);
					console.log(output);
					document.getElementById("frame").src = output;
					//document.getElementById("frame").src = "output";
				} else {
					 console.info( "This page is not reloaded");
				}
			}
			
			function myFunction1() {
				document.getElementById("frame").src = "dashboard.php";
			}
			function myFunction2() {
				document.getElementById("frame").src = "addstudent.php";	
			}
		</script>
	</head>
	<body onload="check()">
		<section id="menu">
			<a href="#dashboard"><button onclick="myFunction1()">Dashboard</button></a>
			<a href="#addstudent"><button onclick="myFunction2()">Add Student</button></a>
		</section>
		<iframe src="" id="frame" class="iframe"  width="600px"></iframe>
	</body>
</html>	