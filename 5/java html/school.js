	function school(){
		var output = document.getElementById('disp');
		output.innerHTML=''+
		'<div class="cont">'+
					'<center style="background:green;color:white;"><h1 >Add School</h1></center>'+
						'<form method="POST" action="../logic/insert school.php">'+
							'<table class="table">'+
								'<tr>'+
									'<th></th>'+
									'<th></th>'+
									'<th></th>'+
									'<th></th>'+
									'<th></th>'+
									'<th></th>'+
								'</tr>'+
								'<tr>'
									'<td class="labels">School Name:</td>'+
									'<td class="inputs"><input type="text" name="schlname"></td>'+
									'<td class="labels">School Address:</td>'+
									'<td class="inputs"><input type="text" name="schladdress"></td>'+
									'<td class="labels">Logo</td>'+
									'<td rowspan="2" class="inputs"><img src="img_avatar.png" style="height:60px;width:60px;" name="schllogo"></td>'+
								'</tr>'+
								'</table>';
	}
	