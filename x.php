<?php


function bot($method, $datas = []) {
$token = "5224127818:AAEYE0LQpTNVRmPiu3dqBibUmhFLzFQJd_Q";
$url = "https://api.telegram.org/bot$token/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}
function getupdates($up_id) {
$get = bot('getupdates', ['offset' => $up_id]);
return end($get['result']);
}


$id = "2053539816";


while (1) {
	
	
$get_up = getupdates($last_up + 1);
$last_up = $get_up['update_id'];
if ($get_up) {
	$message = $get_up['message'];
	$mid = $get_up['message']['message_id'];
	$userID = $message['from']['id'];
	$chat_id = $message['chat']['id'];
	$firstname = $message["from"]["first_name"]; 
     $text = $message['text'];
     


if($text == '/start'){




bot('sendMessage',[
        'chat_id'=>$chat_id,
         'text'=>"مرحبا بك في بوت التزوير 
قم بارسل المعلومات بهذا الشكل :
الاسم:الكود:اليوزر
مثال :
ZERO:5428:@XRZ8X \n.BY  @PIII9"]);
         } 
         
         
 if(strpos($text, ":")){

 $s = explode(":",$text)[0];
 $d = explode(":",$text)[1];
 $f = explode(":",$text)[2];
 $img = imagecreatefromjpeg('oo.jpg');
$white = imagecolorallocate($img, 0, 0, 0);
$j = system("pwd");


$font = "$j/AmaticSC-Regular.ttf";
imagettftext($img, 40, 0, 280, 500, $white, $font, "$s \n $d \n $f");
imagejpeg($img, "SAVE.JPG", 2000);

bot('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>new CURLFile("SAVE.JPG")
 ]);
 }

}
  
}
