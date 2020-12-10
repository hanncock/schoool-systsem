<html>
	<head>
		<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("fname").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../tests/search ajax.php?fname=" + str, true);
        xmlhttp.send();
    }
}
</script>
	</head>
	<body>
	<form>
	<select name="fname" id="fname" onchange="showHint(this.value)">
		<option value="soke">Soke</option>
		<option value="Kevo">Kevo</option>
	</select>
First name: <!--input type="text" onkeyup="showHint(this.value)" name="fname"-->
</form>
<p>Suggestions: <span id="txtHint"></span></p>
		<!--form action="" >
		<input type="text" name="fname" id="fname" onkeyup="showCustomer(this.value)"><!--onkeyup="search()"-->
		<!--input type="submit">
		</form>
		<div id="disp"></div>
	</body>
	<!--script>
	function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("fname").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("fname").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "search ajax.php?fname="+str, true);
  xhttp.send();
}
	/*function search(){
		var str = document.getElementById('fname').value;
		var xhttp = new XMLHttpRequest();
				xhttp.open("POST","search ajax.php?fname=" + str, true);
				xhttp.open("GET","search ajax.php", true);
				xhttp.send();
				document.getElementById('disp').innerHTML=str;
	}

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
	</script-->
</html>

