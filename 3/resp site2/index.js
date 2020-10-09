function closeNav(){
document.getElementById('menu').style.display="none";
//document.getElementById('menu').style.transition="2s";
document.getElementById('menu2').style.display = "block";
document.getElementById('closebtn').style.display= "none";
}	

function openNav(){
document.getElementById('menu').style.display="block";
document.getElementById('menu2').style.display = "none";
document.getElementById('closebtn').style.display= "block";
}
function stdinfo(){
document.getElementById('stdinfo').style.display="none";
document.getElementById('parentinfo').style.display="none";
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