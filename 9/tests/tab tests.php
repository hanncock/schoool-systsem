<html>
	<head>
		<style>
		.allwindows{
			height:100%;
			background:yellow;
			display:none;
		}
		
		</style>
		<script>
			function refresh(){
				console.log('welcome');
				var x = window.location.href;
				console.log(x);
				location.assign(x);
			}
			function refresh2(){
				console.log('refresh2');
			}
			
			var url=document.location.toString();
			console.log(url);
			
			/*
			function refresh(){       
				// Write your code here to get current tab
				// Assume tab is #tab2
				//Url is: http: abcwebsite.com/a.php#tab2
				// location.reload(true);
				var current_url = ""; //Get the current page here
				window.location = current_url + "#tab2";
			}
			 Write the code to activate a tab from the url

			$(function() {
				if(window.location.hash) {
					var activeTab = window.location.hash;
					// Write the code to active the tab active here
					$('#myTab a[href="' + activeTab + '"]').tab('show');
				} else {
					// No hash found
					// Write the code to active the the default tabe
					$('#myTab a[href="#tab1"]').tab('show');
				}
			});
			*/
		</script>
	</head>
	<body onload="refresh()">
		<ul>
			<li onclick="document.getElementById('home').style.display='block';"><a href="tab tests.php#home">Home</a></li>
			<li onclick="document.getElementById('school').style.display='block';document.getElementById('home').style.display='none'"><a href="#school">School</a></li>
			<li onclick="document.getElementById('bank').style.display='block';"><a href="#bank">Bank</a></li>
			<li onclick="document.getElementById('garden').style.display='block';"><a href="#garden">Garden</a></li>
		</ul>
		<section id="home" class="allwindows">
			<?php include('tabtest.php')?>
		</section>
		<section id="school" class="allwindows">
			tis is the school page
		</section>
		<section id="bank" class="allwindows">
			this is the  bamk page
		</section>
		<section id="garden" class="allwindows">
			this is the garden page
		</section>


	</body>
</html>
<!--DOCTYPE html>
<html>
<body>

<button onclick="myFunction()">Load new document</button>

<script>
function myFunction() {
	var x = "https://www.google.com/";
  location.assign(x);
}
</script>

</body>
</html-->