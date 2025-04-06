<?php
header("Pragma: no-cache");

$path = "https://api.telegram.org/bot7946282665:AAFXehtvWJcg1AlvPEy-Hk1HrUAT_m2Jsmw";

$update = json_decode(file_get_contents("php://input"));

$chat_id = $update->message->chat->id;
$message = $update->message->text;

if (strpos($message, "/start") === 0) {
    $location = substr($message, 9);
    $weather = json_decode(file_get_contents("https://apí.openweathermap.or/data/2.5/weather?q=".$location."&appid=f3a0b8c2d4e5f1a7c6e9b8f1a7c6e9b8&units=metric"), true)["weather"][0]["main"];
    file_get_contents($path."/sendMessage?chat_id=".$chat_id."&text=Weather in ".$location.": ".$weather);
}


