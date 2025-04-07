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
    $response = "Bienvenido a ShopBot. Escribe el producto que deseas buscar o usa /productos para ver la lista de productos. \n\nSi necesitas ayuda, usa /ayuda.";
} elseif ($message == "/ayuda") {
    $response = "Comandos disponibles:\n1.- /start - Inicia la conversación\n2.- /ayuda Muestra el menú de ayuda\n3.- /productos  Muestra la lista de productos\n4.- /salir - Termina la conversación\nPara buscar un producto, simplemente escribe su nombre o usa el comando correspondiente. \n\nEjemplo: Carne, Queso, Leche, /Carne, /Queso etc.";
} elseif ($message == "/productos") {
    $response = "Estos son nuestros productos:\n\n1. /carne \n2. /queso \n3. /jamon \n4 /leche \n5 /yogurt \n6 /cereal \n7 /bebidas \n8 /jugos \n9 /pan \n10 /pasteles \n11 /tortas \n12 /detergente \n13 /lavaloza \n\nUsa el nombre del producto para ver su ubicación.";

} elseif ($message == "/carne" || $message == "/queso" || $message == "/jamon" || $message == "Carne" || $message == "Queso" || $message == "Jamon") {
    $response = "El producto que has elegido está en el pasillo 1. \n\nSi necesitas ver más productos, usa /productos.";
} elseif ($message == "/leche" || $message == "/yogurt" || $message == "/cereal" || $message == "Cereal" || $message == "Leche" || $message == "Yogurt") {
    $response = "El producto que has elegido está en el pasillo 2. \n\nSi necesitas ver más productos, usa /productos.";
} elseif ($message == "/bebidas" || $message == "/jugos" || $message == "Bebidas" || $message == "Jugos")
{
    $response = "El producto que has elegido está en el pasillo 3. \n\nSi necesitas ver más productos, usa /productos.";
} elseif ($message == "/pan" || $message == "/pasteles" || $message == "/tortas" || $message == "Pan" ||$message == "Pasteles" || $message == "Tortas") {
    $response = "El producto que has elegido está en el pasillo 4. \n\nSi necesitas ver más productos, usa /productos.";
} elseif ($message == "/detergente" || $message == "/lavaloza" || $message == "Detergente" || $message == "Lavaloza") {
    $response = "El producto que has elegido está en el pasillo 5. \n\nSi necesitas ver más productos, usa /productos.";
}elseif ($message == "/salir"){
    $response = "Gracias por usar ShopBot. ¡Hasta luego!";
} else {
    $response = "No entiendo tu pregunta. Usa /ayuda para ver los comandos disponibles.";
}
sendMessage($chat_id, $response);

