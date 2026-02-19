<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diamonds = $_POST['diamonds'];
    $user_info = $_POST['user_info'];
    $amount   = number_format((float)$_POST['price'], 2, '.', '');
    
    // API Configuration
    $base_url = "https://khqr.cc/api/payment/request/fQLaAyCi6YyyCI1jMxcfyANOrvhp2Zbr";
    $secret   = "rbLL31D60kp1g0LlWus7kMLfoFvx5rYR"; 
    
    $order_id = "BKA-" . time();
    $success_url = "https://" . $_SERVER['HTTP_HOST'] . "/success.php";
    $remark   = "Buy $diamonds Diamonds for $user_info";

    // Security Hash (Secret + ID + Amount + URL + Remark)
    $hash = sha1($secret . $order_id . $amount . $success_url . $remark);

    $params = [
        "transaction_id" => $order_id,
        "amount" => $amount,
        "success_url" => $success_url,
        "remark" => $remark,
        "hash" => $hash
    ];

    // Redirect to Gateway
    header("Location: " . $base_url . "?" . http_build_query($params));
    exit;
}
?>
