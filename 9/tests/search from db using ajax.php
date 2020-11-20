<html>
	<head>
	
	</head>
	<body>
		<form action="" >
		<input type="text" name="fname" id="fname" onkeyup="search()">
		<input type="submit">
		</form>
		<div id="disp"></div>
	</body>
	<script>
	/*function search(){
		var str = document.getElementById('fname').value;
		var xhttp = new XMLHttpRequest();
				xhttp.open("POST","search ajax.php?fname=" + str, true);
				xhttp.open("GET","search ajax.php", true);
				xhttp.send();
				document.getElementById('disp').innerHTML=str;
	}*/

	var str = document.getElementById('fname').value; 
		function search(str){
			if(str.length == 0){
				document.getElementById('disp').innerHTML="";
				return;
			}else{
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST","search ajax.php?fname=" + str, true);
				xhttp.open("GET","search ajax.php", true);
				xhttp.send();
				//document.getElementById('disp').innerHTMl="soke";
		}
		}
	</script>
</html>

