function check(){
	if (window.performance) {
		 console.info("window.performance works fine on this browser");
	}
	if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
		console.info( "This page is reloaded" );
		var val = window.location.href;
		var foundString = val.substr(val.indexOf('#')+1,);
		var str1 = ".php";
		var output  = foundString.concat(str1);
		console.log(output);
		document.getElementById("frame").src = output;
		} else {
			 console.info( "This page is not reloaded");
		}
		document.getElementById("headpage").innerHTML= foundString ;
}	
function myFunction1() {
		document.getElementById("frame").src = "dashboard.php";
}
function myFunction2() {
	document.getElementById("frame").src = "addstudent.php";	
}
function myFunction3() {
	document.getElementById("frame").src = "registerpatient.php";	
}