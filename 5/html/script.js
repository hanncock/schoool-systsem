var results = document.getElementById('display');
function winner(){
	results.innerHTML="welcome<br>"+
	'today is monday'+
	'<b><h2>we shall  begin</h2>'+
	'<button onclick="disp()">click me</button>';
}
function disp(){
	results.innerHTML="clicked button";
}
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