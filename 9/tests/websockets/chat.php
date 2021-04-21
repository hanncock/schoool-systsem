<html>
	<body>
		<form method="POST">
			<input type="text" name="txtMessage">
			<input type="submit" name="btnSend" value="Send">
			
			<?php
				$host = '127.0.0.1';
				$port = 20205;
				
				if(isset($_post['btnSend'])){
					$msg = $_REQUEST['txtMessage'];
					$sock = socket_create(AF_INET, SOCK_STREAM, 0);
					socket_connect($sock, $host, $port );
					
					socket_write($sock, $msg strim($msgs));
					
					$reply = socket_read($sock, 1924);
					$reply = trim($reply);
					$reply = "server says:\t".$reply;
				}
			?>
		</form>
		
		<textarea><?php echo @$reply; ?></textarea>
	</body>
</html>