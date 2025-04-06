<?php
header("Pragma: no-cache");

$path = "https://api.telegram.org/bot7946282665:AAFXehtvWJcg1AlvPEy-Hk1HrUAT_m2Jsmw";

$update = json_decode(file_get_contents("php://input"));

$chat_id = $update->message->chat->id;
$message = $update->message->text;

function sendMessage($chat_id, string $response)
{
    global $path;
    $url = $path . "/sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($response);
    file_get_contents($url);
}

switch ($message) {
    case "/start":
        $response = "Bienvenido a ShopBot!\n\nPara Comenzar, por favor ingrese /productos para ver los productos disponibles.";
        sendMessage($chat_id, $response);
        break;

    case "/productos":
        $response = "Productos disponibles:\n1. /Carne A\n2. /Queso\n3. /Jamón\n4. Cereal\n5. Leche\n6. Yogur\n7. Bebidas\n8. Jugos\n9. Pan\n10. Pasteles\n11. Tortas\n12. Detergente\n13. Lavaloza";
        sendMessage($chat_id, $response);
        break;

   case "/Carne" || "/Queso" || "Jamon":
        $response = "El producto que seleccionaste se encuentra en el pasillo 1";
        sendMessage($chat_id, $response);
        break;

    case "/help":
        $response = "Available commands:\n/start - Inicia el bot\n/help - Muestra la ayuda\n/products - Muestra los productos disponibles";
        sendMessage($chat_id, $response);
        break;

    default:
        $response = "No entiendo lo que dices.\n\nEscribe /help para ver los comandos disponibles.";
        break;
}

