<?php
header("Pragma: no-cache");

$input = file_get_contents('php://input');
$update = json_decode($input);

$chat_id = $update->message->chat->id;
$message = $update->message->text;

