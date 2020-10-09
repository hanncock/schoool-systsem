<html>
	<head></head>
	<body>
		<button onclick='winner()'>Print</button>
	</body>
</html>
<script type="text/javascript">
	function winner(){
		 let mywindow = window.open('', 'PRINT', 'height=500,width=800,top=100,left=150');

  mywindow.document.write('hello soke');
  mywindow.document.close();
  mywindow.print();
	}
</script>