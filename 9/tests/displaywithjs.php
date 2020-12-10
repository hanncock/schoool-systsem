<html>
	<head>
		<script>
			function disp(){
				//alert('hey');
				
				document.getElementById('data').innerHTML=document.getElementById('dat');
			}
		</script>
	</head>
	<body>
		<button onclick="disp()">Disp</button>
		<section id="data"></section>
		<section id="dat" class="dat">
			<h2>welcome</h2>
			how are you
		</section>
	</body>
</html>