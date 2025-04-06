<?php
header("Pragma: no-cache");

$path = "https://api.telegram.org/bot7946282665:AAFXehtvWJcg1AlvPEy-Hk1HrUAT_m2Jsmw";

$update = json_decode(file_get_contents("php://input"));
if (isset($update->callback_query)) {
    $chat_id = $update->callback_query->message->chat->id;
    $message = $update->callback_query->data;
} else {
    $chat_id = $update->message->chat->id;
    $message = $update->message->text;
}

if ($message == "/start") {
    $response = "Welcome to the bot! Please choose an option:";
    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => 'Option 1', 'callback_data' => 'option1'],
                ['text' => 'Option 2', 'callback_data' => 'option2']
            ],
            [
                ['text' => 'Option 3', 'callback_data' => 'option3']
            ]
        ]
    ];
    $encodedKeyboard = json_encode($keyboard);
    file_get_contents($path . "/sendMessage?chat_id=$chat_id&text=" . urlencode($response) . "&reply_markup=" . urlencode($encodedKeyboard));
} elseif ($message == "option1") {
    $response = "You selected Option 1!";
    file_get_contents($path . "/sendMessage?chat_id=$chat_id&text=" . urlencode($response));
} elseif ($message == "option2") {
    $response = "You selected Option 2!";
    file_get_contents($path . "/sendMessage?chat_id=$chat_id&text=" . urlencode($response));
} elseif ($message == "option3") {
    $response = "You selected Option 3!";
    file_get_contents($path . "/sendMessage?chat_id=$chat_id&text=" . urlencode($response));
} else {
    $response = "Unknown command.";
    file_get_contents($path . "/sendMessage?chat_id=$chat_id&text=" . urlencode($response));
}
// Handle callback queries
if (isset($update->callback_query)) {
    $callback_data = $update->callback_query->data;
    if ($callback_data == "option1") {
        $response = "You selected Option 1!";
    } elseif ($callback_data == "option2") {
        $response = "You selected Option 2!";
    } elseif ($callback_data == "option3") {
        $response = "You selected Option 3!";
    }
    file_get_contents($path . "/answerCallbackQuery?callback_query_id=" . $update->callback_query->id . "&text=" . urlencode($response));
}
// Send a message to the user
file_get_contents($path . "/sendMessage?chat_id=$chat_id&text=" . urlencode($response));


