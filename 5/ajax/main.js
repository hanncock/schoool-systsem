/*var animalContainer = document.getElementById("animal-info");
var btn = document.getElementById('btn');
btn.addEventListener("click", function(){
	
	var ourRequest = new XMLHttpRequest();

ourRequest.open('GET','https://learnwebcode.github.io/json-example/animals-1.json');

ourRequest.onload = function(){
	
	var ourData = JSON.parse(ourRequest.responseText);
	renderHTML(ourData);
	console.log('welcome');
};
ourRequest.send();
});

function renderHTML(data){
	var htmlString = "";
	
	for(i=0; i<data.length; i++){
		htmlString += "<p>" + data[i].name + "</p>";
	}
}*/
window.onLoad = function(){
	var btn = document.getElementById('btn');
	var data = fetch('https://learnwebcode.github.io/json-example/animals-1.json');
	
		console.log('fetcch', data.json());
	}
