<?php
// success.php
$order_id = $_GET['order_id'];
$amount   = $_GET['amount'];
$item     = $_GET['item'];

// ផ្ញើសារទៅ Telegram Group (ដំណាក់កាលទី ២: បង់រួចរាល់ ✅)
$telegram_token = "8521786421:AAEBBoxq7aJHMGSQe0yS8j53JUWrIZCNv3g"; 
$chat_id = "-5275023851"; 
$msg = "✅ **PAID SUCCESS!**\n";
$msg .= "📄 Order: $order_id\n";
$msg .= "💰 Total: $$amount\n";
$msg .= "📦 Item: $item";
@file_get_contents("https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$chat_id&text=".urlencode($msg)."&parse_mode=Markdown");
?>
