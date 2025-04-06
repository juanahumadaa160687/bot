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
        $response = "Bienvenido a ShopBot!\n\nPara Comenzar, por favor escriba el producto que desea consultar o escriba /productos para ver los productos disponibles.";
        sendMessage($chat_id, $response);
        break;

    case "/productos":
        $response = "Productos disponibles:\n1. /Carne \n2. /Queso\n3. /Jamon\n4. /Cereal\n5. /Leche\n6. /Yogur\n7. /Bebidas\n8. /Jugos\n9. /Pan\n10. /Pasteles\n11. /Tortas\n12. /Detergente\n13. /Lavaloza";
        sendMessage($chat_id, $response);
        break;

   case "/Carne" || "/Queso" || "/Jamon":
        $response = "El producto que seleccionaste se encuentra en el pasillo 1. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/Cereal" || "/Leche" || "/Yogur":
        $response = "El producto que seleccionaste se encuentra en el pasillo 2. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/Bebidas" || "/Jugos":

        $response = "El producto que seleccionaste se encuentra en el pasillo 3. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/Pan" || "/Pasteles" || "/Tortas":
        $response = "El producto que seleccionaste se encuentra en el pasillo 4. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/Detergente" || "/Lavaloza":
        $response = "El producto que seleccionaste se encuentra en el pasillo 5. \n\nSi deseas ver más productos, escribe /productos.";
        sendMessage($chat_id, $response);
        break;

    case "/ayuda":
        $response = "Opciones disponibles:\n/start - Inicia el bot\n/ayuda - Muestra la ayuda\n/productos - Muestra los productos disponibles";
        sendMessage($chat_id, $response);
        break;

    default:
        $response = "No entiendo lo que dices.\n\nEscribe /ayuda para ver los comandos disponibles.";
        break;
}

