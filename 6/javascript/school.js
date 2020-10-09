function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function closeNav(){
	document.getElementById('menu').style.width = "50px";
	document.getElementById('tab').style.display = "none";
	document.getElementById('tab2').style.width = "50px";
	document.getElementById('tab2').style.display = "block";
	document.getElementById('content').style.display = "none";
	document.getElementById('contents').style.display = "none";
	document.getElementById('closebtn').style.display= "block";
	document.getElementById('openbtn').style.display= "block";
}	

function openNav(){
	document.getElementById('tab').style.display = "block";
	document.getElementById('tab2').style.display = "none";
	document.getElementById('menu').style.width = "250px";
	document.getElementById('openbtn').style.display= "block";
	document.getElementById('closebtn').style.display= "block";
}


var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block" ) {
	  openNav();
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
/*function myDrop1(){
	var drop =document.getElementById('content');
	if (drop.style.display === "none"){
	drop.style.display= "block"
	}else{
	drop.style.display = "none"}
	openNav();
}
function myDrop2(){
	var drop =document.getElementById('contents');
	if (drop.style.display === "none"){
	drop.style.display= "block"
	}else{
	drop.style.display = "none"}
}
function myDrop3(){
	var drop =document.getElementById('content1');
	if (drop.style.display === "none"){
	drop.style.display= "block"
	}else{
	drop.style.display = "none"}
}*/
	