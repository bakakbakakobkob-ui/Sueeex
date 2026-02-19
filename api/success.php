<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>ជោគជ័យ - Baka Store</title>
    <style>
        body { background: #111827; color: white; font-family: sans-serif; text-align: center; padding: 50px; }
        .box { background: #1f2937; padding: 40px; border-radius: 20px; display: inline-block; box-shadow: 0 10px 20px rgba(0,0,0,0.5); }
        .icon { font-size: 80px; color: #10b981; margin-bottom: 20px; }
        .btn { display: inline-block; background: #fbbf24; color: black; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="box">
        <div class="icon">✓</div>
        <h1>ការបង់ប្រាក់ជោគជ័យ!</h1>
        <p>អរគុណសម្រាប់ការគាំទ្រ។ ពេជ្រនឹងចូលគណនីរបស់អ្នកក្នុងពេលឆាប់ៗនេះ។</p>
        <hr style="border: 0; border-top: 1px solid #374151; margin: 20px 0;">
        <p>ID ប្រតិបត្តិការ: <?php echo $_GET['transaction_id'] ?? 'N/A'; ?></p>
        <a href="index.php" class="btn">ត្រឡប់ទៅហាងវិញ</a>
    </div>
</body>
</html>
