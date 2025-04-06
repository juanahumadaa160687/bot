<?php
header("Pragma: no-cache");

$token = $_ENV["TELEGRAM_BOT_TOKEN"];
$path = "https://api.telegram.org/bot".$token;

$update = json_decode(file_get_contents("php://input"));

$chat_id = $update->message->chat->id;
$message = $update->message->text;

function sendMessage($chat_id, string $response)
{
    global $path;
    $url = $path . "/sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($response);
    file_get_contents($url);
}

if ($message == "/start") {
    $response = "Welcome to the bot! Use /help to see available commands.";
    sendMessage($chat_id, $response);
} elseif ($message == "/help") {
    $response = "Available commands:\n/start - Start the bot\n/help - Show this help message";
    sendMessage($chat_id, $response);
} elseif ($message == "/productos") {
    $response = "Here are the available products:\n1. /Product A\n2. /Product B\n3. /Product C";
    sendMessage($chat_id, $response);
} elseif ($message == "/Product A") {
    $response = "Product A is a great choice! It costs $10.";
    sendMessage($chat_id, $response);
} elseif ($message == "/Product B") {
    $response = "Product B is a great choice! It costs $20.";
    sendMessage($chat_id, $response);
} elseif ($message == "/Product C") {
    $response = "Product C is a great choice! It costs $30.";
    sendMessage($chat_id, $response);
} else {
    $response = "Unknown command. Use /help to see available commands.";
    sendMessage($chat_id, $response);
}

