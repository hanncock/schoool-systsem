function check(){
	if (window.performance) {
		 console.info("window.performance works fine on this browser");
	}
	console.info(performance.navigation.type);
	if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
		document.getElementById("menudiv").style.display="block";
		 console.info( "This page is reloaded" );
	} else {
		document.getElementById("menudiv").style.display="none";
		 console.info( "This page is not reloaded");
	}
	//document.getElementById("frame").style.display="none";
}
	
