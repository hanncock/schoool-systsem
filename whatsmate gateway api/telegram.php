<!--?php
$INSTANCE_ID = '1175446417';  // TODO: Replace it with your gateway instance ID here
$CLIENT_ID = "374659345";  // TODO: Replace it with your Premium client ID here
$CLIENT_SECRET = "PUBLIC_SECRET";   // TODO: Replace it with your Premium client secret here

$postData = array(
  'number' => '0700202696',  // Specify the recipient's number (NOT the gateway number) here.
  'message' => 'Have a nice day! Loving you:)'  // FIXME
);

$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);

$url = 'http://api.whatsmate.net/v1/telegram/single/message/' . $INSTANCE_ID;
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);

echo "Response: ".$response;
curl_close($ch);
?-->
<!Doctype html>
<html>
	<head>
	</head>
	<body>
		<form method="POST" action="">
			Message
			<input type="text" name="message">
			<input type="submit" name="send" value="Send">
		</form>
	</body>
</html>
<?php 
function telegram($msg) {
        global $telegrambot,$telegramchatid;
        $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';
		$data=array('chat_id'=>$telegramchatid,'text'=>$msg);
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}
$telegrambot = '1175446417:AAGmxBVkcYAi3bWbxRin2q35P3EohfKEgEw';

$telegramchatid=309200565;

telegram ("Here is your message!!");

$path ='https://api.telegram.org/bot'.$telegrambot.'/getUpdates';
echo $path;
$soke = file_get_contents($path);
echo $soke;
?>


<!--?php
$path =  'https://api.telegram.org/bot1175446417:AAGmxBVkcYAi3bWbxRin2q35P3EohfKEgEw/get';

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if (strpos($message, "/weather") === 0) {
$location = substr($message, 9);
$weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=mytoken"), TRUE)["weather"][0]["main"];
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$location.": ". $weather);
}
?-->