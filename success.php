<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ការបង់ប្រាក់ជោគជ័យ</title>
    <link rel="stylesheet" href="style.css"> <style>
        .success-container {
            background: #161b22;
            border: 2px solid #00d2ff;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 450px;
            width: 90%;
            margin-top: 50px;
            box-shadow: 0 0 30px rgba(0, 210, 255, 0.2);
        }
        .check-icon {
            font-size: 80px;
            color: #00d2ff;
            margin-bottom: 20px;
            display: block;
            animation: bounce 1s ease infinite alternate;
        }
        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-10px); }
        }
        .details {
            background: #0d1117;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }
        .details p {
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #30363d;
            padding-bottom: 5px;
        }
        .back-home {
            display: inline-block;
            text-decoration: none;
            background: #00d2ff;
            color: #0b0e14;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
        }
        .back-home:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #00d2ff;
        }
    </style>
</head>
<body>

    <div class="success-container">
        <span class="check-icon">✅</span>
        <h1>ការបង់ប្រាក់ជោគជ័យ!</h1>
        <p style="color: #8b949e;">អរគុណសម្រាប់ការគាំទ្រ។ Diamonds របស់អ្នកនឹងចូលក្នុងគណនីក្នុងពេលឆាប់ៗនេះ។</p>

        <div class="details">
            <p><span>លេខប្រតិបត្តិការ:</span> <span style="color: #00d2ff;"><?php echo $_GET['transaction_id'] ?? 'N/A'; ?></span></p>
            <p><span>ចំនួនទឹកប្រាក់:</span> <span style="color: #00d2ff;">$<?php echo $_GET['amount'] ?? '0.00'; ?></span></p>
            <p><span>ស្ថានភាព:</span> <span style="color: #00ff88;">ជោគជ័យ</span></p>
        </div>

        <a href="index.php" class="back-home">ត្រឡប់ទៅទំព័រដើម</a>
    </div>

</body>
</html>
