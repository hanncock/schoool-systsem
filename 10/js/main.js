//window.location.reload();
function refresh()
{       
  // Write your code here to get current tab
  // Assume tab is #tab2
  //Url is: http: abcwebsite.com/a.php#tab2
  // location.reload(true);
  var current_url = ""; //Get the current page here
  window.location = current_url + "#tab2";
}
function refresh2(){
	console.log('welcome');
	document.getElementById(cityname);
	openCity(evt,document.getElementById(cityname));
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