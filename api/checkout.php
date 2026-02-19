<?php
// 1. Error Reporting (For Debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Collect Data
    $diamonds  = $_POST['diamonds'] ?? '0';
    $user_info = $_POST['user_info'] ?? 'Unknown';
    $raw_price = $_POST['price'] ?? 0;
    
    // 3. Format Amount (KHQR.cc requires exactly 2 decimal places)
    $amount = number_format((float)$raw_price, 2, '.', '');
    
    // 4. API Credentials
    // Double check these in your KHQR.cc dashboard
    $api_id = "fQLaAyCi6YyyCI1jMxcfyANOrvhp2Zbr"; 
    $secret = "rbLL31D60kp1g0LlWus7kMLfoFvx5rYR"; 
    
    $base_url = "https://khqr.cc/api/payment/request/" . $api_id;
    
    // 5. Build Parameters
    $order_id    = "BKA-" . time();
    $success_url = "https://" . $_SERVER['HTTP_HOST'] . "/success.php";
    $remark      = "Topup $diamonds Diamonds for $user_info";

    // 6. Generate Security Hash
    // Sequence: Secret + TransactionID + Amount + SuccessURL + Remark
    $hash_string = $secret . $order_id . $amount . $success_url . $remark;
    $hash = sha1($hash_string);

    $params = [
        "transaction_id" => $order_id,
        "amount"         => $amount,
        "success_url"    => $success_url,
        "remark"         => $remark,
        "hash"           => $hash
    ];

    // 7. Redirect using a clean URL
    $final_url = $base_url . "?" . http_build_query($params);
    
    header("Location: " . $final_url);
    exit;
} else {
    // Redirect back to shop if accessed directly
    header("Location: index.php");
    exit;
}
