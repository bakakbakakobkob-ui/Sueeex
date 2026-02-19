<?php
// chackout.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diamonds  = $_POST['diamonds'] ?? 'Unknown';    
    $user_id   = $_POST['user_id'] ?? 'N/A';     
    $server_id = $_POST['server_id'] ?? 'N/A';   
    $amount    = number_format((float)($_POST['price'] ?? 0), 2, '.', ''); 
    
    $telegram_token = "8521786421:AAEBBoxq7aJHMGSQe0yS8j53JUWrIZCNv3g"; 
    $chat_id = "-5275023851"; 

    $base_url = "https://khqr.cc/api/payment/request/fQLaAyCi6YyyCI1jMxcfyANOrvhp2Zbr";
    $secret   = "rbLL31D60kp1g0LlWus7kMLfoFvx5rYR"; 
    $order_id = "MRX-" . time();

    // កែសម្រួល Success URL ឱ្យកាន់តែច្បាស់លាស់សម្រាប់ Vercel
    // ប្រសិនបើ success.php របស់អ្នកនៅ root ប្រើបែបនេះ៖
    $success_url = "https://" . $_SERVER['HTTP_HOST'] . "/success.php?order_id=$order_id&amount=$amount&item=" . urlencode($diamonds);
    
    $remark = "MLBB-$diamonds ID:$user_id($server_id)";

    // បង្កើត Hash (ផ្ទៀងផ្ទាត់ជាមួយ API Doc ថាត្រូវប្រើ sha1 ឬ md5)
    $hash = sha1($secret . $order_id . $amount . $success_url . $remark);

    // ផ្ញើសារទៅ Telegram
    $msg = "⏳ **Order Pending...**\n";
    $msg .= "📦 $diamonds | 💰 $$amount\n";
    $msg .= "🆔 ID: `$user_id` ($server_id)";
    
    $tg_url = "https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$chat_id&text=".urlencode($msg)."&parse_mode=Markdown";
    @file_get_contents($tg_url);

    // បង្កើត Redirect URL ឱ្យមានរបៀបរៀបរយ
    $final_url = $base_url . "?" . http_build_query([
        "transaction_id" => $order_id,
        "amount" => $amount,
        "success_url" => $success_url,
        "remark" => $remark,
        "hash" => $hash
    ]);

    header("Location: $final_url");
    exit;
}
?>
