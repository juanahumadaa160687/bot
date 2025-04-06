<?php
header("Pragma: no-cache");

$path = "https://api.telegram.org/bot7946282665:AAFXehtvWJcg1AlvPEy-Hk1HrUAT_m2Jsmw";

$update = json_decode(file_get_contents("php://input"));

$chat_id = $update->message->chat->id;
$message = $update->message->text;

if ($message == "/start") {
    $response = "Welcome to the bot! Use /help to see available commands.";
} elseif ($message == "/help") {
    $response = "Available commands:\n/start - Start the bot\n/help - Show this help message";
} else {
    $response = "I don't understand that command.";
}
file_get_contents($path . "/sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($response));


