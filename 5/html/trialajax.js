var results = document.getElementById('win');
results.innerHTML = "werocome";

function displayer(){
	results.innerHTML="display1";
}
function displaye(){
	results.innerHTML="display2";
}
function display(){
	results.innerHTML= 'sdcsdsd';
}
function dipla(){
	//tablinks=document.getElementsByClassName('dispdata');
		//for(i=0; i<tablinks.length; i++){
			//tablinks[i].className = tablinks[i].className.replace("active", "");
		//}
		result.innerHTML="well";
}
function dis(){
	var out=document.getElementById('demo');
	out.innerHTML = 'werocomeagain';
}

function disp(evt, info){
		var i,tabcontent,tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for(i=0; i<tabcontent.length; i++){
			tabcontent[i].style.display ="none";
		}
		tablinks=document.getElementsByClassName('tablinks');
		for(i=0; i<tablinks.length; i++){
			tablinks[i].className = tablinks[i].className.replace("active", "");
		}
		document.getElementById(info).style.display= "block";
		evt.currentTarget.classname += "active";
	}