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
    $response = "Bienvenido a ShopBot. Usa /productos para ver la lista de productos.";
} elseif ($message == "/ayuda") {
    $response = "Comandos disponibles:\n/start - Inicia la conversación\n/help Muestra el menú de ayuda\n/productos  Muestra la lista de productos";
} elseif ($message == "/productos") {
    $response = "Estos son nuestros productos:\n\n1. /carne \n2. /queso \n3. /jamon \n4 /leche \n5 /yogurt \n6 /cereal \n7 /bebidas \n8 /jugos \n9 /pan \n10 /pasteles \n11 /tortas \n12 /detergente \n13 /lavaloza \n\nUsa el nombre del producto para ver su ubicación.";
} elseif ($message == "/carne" || $message == "/queso" || $message == "/jamon") {
    $response = "El producto que has elegido está en el pasillo 1.";
} elseif ($message == "/leche" || $message == "/yogurt" || $message == "/cereal") {
    $response = "El producto que has elegido está en el pasillo 2.";
} elseif ($message == "/bebidas" || $message == "/jugos") {
    $response = "El producto que has elegido está en el pasillo 3.";
} elseif ($message == "/pan" || $message == "/pasteles" || $message == "/tortas") {
    $response = "El producto que has elegido está en el pasillo 4.";
} elseif ($message == "/detergente" || $message == "/lavaloza") {
    $response = "El producto que has elegido está en el pasillo 5.";
} else {
    $response = "Unknown command. Use /help to see available commands.";
}
sendMessage($chat_id, $response);

