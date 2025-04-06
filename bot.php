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

switch ($message) {
    case "/start":
        $response = "Bienvenido a ShopBot!\n\nPara Comenzar, por favor escriba el producto que desea consultar o escriba /productos para ver los productos disponibles.";
        sendMessage($chat_id, $response);
        break;

    case "/productos":
        $response = "Productos disponibles:\n1. /carne \n2. /queso\n3. /jamon\n4. /cereal\n5. /leche\n6. /yogur\n7. /bebidas\n8. /jugos\n9. /pan\n10. /pasteles\n11. /tortas\n12. /detergente\n13. /lavaloza";
        sendMessage($chat_id, $response);
        break;

    case "/ayuda":
        $response = "Opciones disponibles:\n/start - Inicia el bot\n/ayuda - Muestra la ayuda\n/productos - Muestra los productos disponibles";
        sendMessage($chat_id, $response);
        break;

    case "/carne" || "/queso" || "/jamon":
        $response = "El producto que seleccionaste se encuentra en el pasillo 1. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/cereal" || "/leche" || "/yogur":
        $response = "El producto que seleccionaste se encuentra en el pasillo 2. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/bebidas" || "/jugos":
        $response = "El producto que seleccionaste se encuentra en el pasillo 3. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/pan" || "/pasteles" || "/tortas":
        $response = "El producto que seleccionaste se encuentra en el pasillo 4. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/detergente" || "/lavaloza":
        $response = "El producto que seleccionaste se encuentra en el pasillo 5. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    default:
        $response = "No entiendo lo que dices.\n\nEscribe /ayuda para ver los comandos disponibles.";
        break;
}

