<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baka Store | MLBB Topup</title>
    <style>
        :root { --gold: #fbbf24; --dark: #111827; --card: #1f2937; }
        body { background: var(--dark); color: white; font-family: 'Open Sans', sans-serif; padding: 20px; display: flex; justify-content: center; }
        .container { max-width: 450px; width: 100%; }
        .section { background: var(--card); padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 10px 15px rgba(0,0,0,0.5); }
        .input-row { display: flex; gap: 10px; margin-bottom: 10px; }
        input { background: #000; border: 1px solid #374151; color: white; padding: 12px; border-radius: 8px; width: 100%; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .card { background: #374151; padding: 15px; border-radius: 10px; text-align: center; cursor: pointer; border: 2px solid transparent; transition: 0.2s; }
        .card.active { border-color: var(--gold); background: #4b5563; transform: scale(1.02); }
        .btn { background: var(--gold); color: black; border: none; padding: 15px; width: 100%; border-radius: 10px; font-weight: bold; cursor: pointer; margin-top: 10px; font-size: 16px; }
        .btn-check { background: #4b5563; color: white; margin-bottom: 10px; }
        #check-result { color: #10b981; margin: 10px 0; font-weight: bold; display: none; text-align: center; background: rgba(16, 185, 129, 0.1); padding: 10px; border-radius: 8px; }
    </style>
</head>
<body>

<div class="container">
    <h1 style="color:var(--gold); text-align:center;">💎 BAKA STORE</h1>

    <div class="section">
        <h3>1. បញ្ចូលលេខសម្គាល់ (User ID)</h3>
        <div class="input-row">
            <input type="number" id="userid" placeholder="User ID">
            <input type="number" id="zoneid" placeholder="Zone ID">
        </div>
        <button class="btn btn-check" onclick="checkPlayer()">ពិនិត្យឈ្មោះ (Check ID)</button>
        <div id="check-result">ឈ្មោះអ្នកលេង: <span id="player-name"></span></div>
    </div>

    <div class="section">
        <h3>2. ជ្រើសរើសចំនួនពេជ្រ</h3>
        <div class="grid">
            <div class="card" onclick="selectItem(11, 0.01, this)"><b>11 💎</b><br>$0.01</div>
            <div class="card" onclick="selectItem(22, 0.01, this)"><b>22 💎</b><br>$0.01</div>
            <div class="card" onclick="selectItem(100, 1.00, this)"><b>100 💎</b><br>$1.00</div>
            <div class="card" onclick="selectItem(500, 4.50, this)"><b>500 💎</b><br>$4.50</div>
        </div>
    </div>

    <form action="payments.php" method="POST">
        <input type="hidden" name="user_info" id="final_user">
        <input type="hidden" name="diamonds" id="final_diamonds">
        <input type="hidden" name="price" id="final_price">
        <button type="submit" class="btn" id="pay-btn" style="display:none;">បង់ប្រាក់ឥឡូវនេះ (KHQR)</button>
    </form>
</div>

<script>
    function checkPlayer() {
        const uid = document.getElementById('userid').value;
        const zid = document.getElementById('zoneid').value;
        if(uid && zid) {
            document.getElementById('player-name').innerText = "Player_" + uid;
            document.getElementById('check-result').style.display = "block";
            document.getElementById('final_user').value = uid + "(" + zid + ")";
        } else { alert("សូមបញ្ចូល ID និង Zone ID"); }
    }
    function selectItem(dm, pr, el) {
        document.querySelectorAll('.card').forEach(c => c.classList.remove('active'));
        el.classList.add('active');
        document.getElementById('final_diamonds').value = dm;
        document.getElementById('final_price').value = pr;
        document.getElementById('pay-btn').style.display = "block";
    }
</script>
</body>
</html>
