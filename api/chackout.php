<?php
// checkout.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diamonds  = $_POST['diamonds'];    
    $user_id   = $_POST['user_id'];     
    $server_id = $_POST['server_id'];   
    $amount    = number_format((float)$_POST['price'], 2, '.', ''); 
    
    $telegram_token = "8521786421:AAEBBoxq7aJHMGSQe0yS8j53JUWrIZCNv3g"; 
    $chat_id = "-5275023851"; 

    $base_url = "https://khqr.cc/api/payment/request/fQLaAyCi6YyyCI1jMxcfyANOrvhp2Zbr";
    $secret   = "rbLL31D60kp1g0LlWus7kMLfoFvx5rYR"; 
    $order_id = "MRX-" . time();
    $success_url = "https://" . $_SERVER['HTTP_HOST'] . "/success.php?order_id=$order_id&amount=$amount&item=" . urlencode($diamonds);
    $remark   = "Buy $diamonds ID:$user_id($server_id)";

    $hash = sha1($secret . $order_id . $amount . $success_url . $remark);

    // ផ្ញើសារទៅ Telegram Group (ដំណាក់កាលទី ១: រង់ចាំការបង់ប្រាក់)
    $msg = "⏳ **Order Pending...**\n";
    $msg .= "📦 $diamonds | 💰 $$amount\n";
    $msg .= "🆔 ID: `$user_id` ($server_id)";
    @file_get_contents("https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$chat_id&text=".urlencode($msg)."&parse_mode=Markdown");

    // បញ្ជូនទៅបង់លុយ
    header("Location: $base_url?transaction_id=$order_id&amount=$amount&success_url=".urlencode($success_url)."&remark=".urlencode($remark)."&hash=$hash");
    exit;
}
?>
