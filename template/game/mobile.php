<?php
// កំណត់តម្លៃក្នុង PHP Array ដើម្បីងាយស្រួលកែប្រែថ្ងៃក្រោយ
$packages = [
    ["amount" => "86 Diamonds", "price" => 0.01],
    ["amount" => "706 Diamonds", "price" => 12.50],
    ["amount" => "1050 Diamonds", "price" => 18.50],
    ["amount" => "2195 Diamonds", "price" => 37.00]
];
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M·RX TOPUP - Mobile Legends</title>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;700&family=Poppins:wght@600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #63B7C4;
            --primary-light: #52a68c;
            --bg-body: #eef5f2;
            --white: #ffffff;
            --success: #6ebc51;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Kantumruy Pro', sans-serif; }
        body { background-color: var(--bg-body); padding-bottom: 120px; }

        header {
            background: var(--primary-dark);
            padding: 12px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            cursor: pointer;
        }
        .profile-info { display: flex; align-items: center; gap: 10px; }
        .profile-img { width: 45px; height: 45px; border-radius: 50%; border: 2px solid white; object-fit: cover; }
        .brand-text b { display: block; font-size: 16px; }
        .brand-text span { font-size: 11px; opacity: 0.8; }

        .container { padding: 15px; max-width: 500px; margin: auto; }

        .banner-card { width: 100%; border-radius: 25px; overflow: hidden; margin-bottom: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .banner-card img { width: 100%; display: block; }

        .game-info-card { background: white; border-radius: 20px; padding: 15px; display: flex; align-items: center; gap: 15px; margin-bottom: 20px; }
        .game-icon { width: 65px; height: 65px; border-radius: 15px; object-fit: cover; }
        .instant-badge { font-size: 12px; color: var(--success); display: flex; align-items: center; gap: 4px; font-weight: bold; margin-top: 4px; }

        .step-card { background: var(--primary-dark); border-radius: 25px; padding: 25px 20px; color: white; margin-bottom: 20px; }
        .step-header { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
        .step-num { 
            background: white; color: var(--primary-dark); 
            width: 32px; height: 32px; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; 
            font-weight: 800; font-family: 'Poppins';
        }

        .input-row { display: flex; gap: 12px; margin-bottom: 15px; }
        .input-field { background: white; border-radius: 15px; display: flex; align-items: center; padding: 14px 15px; gap: 8px; flex: 1; }
        .input-field span { color: #ccc; font-weight: bold; font-size: 18px; }
        .input-field input { border: none; outline: none; width: 100%; font-size: 18px; font-weight: bold; color: #333; }
        .btn-check-id { 
            width: 100%; background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.4); 
            border-radius: 15px; padding: 14px; color: white; font-weight: bold; cursor: pointer; transition: 0.3s;
        }

        .diamond-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
        .diamond-item { background: white; border-radius: 20px; padding: 15px; text-align: center; cursor: pointer; position: relative; border: 3px solid transparent; transition: 0.2s; }
        .diamond-item b { display: block; color: #333; font-size: 14px; margin-bottom: 4px; }
        .diamond-item span { color: var(--primary-dark); font-weight: 800; font-family: 'Poppins'; }
        .diamond-item.active { border-color: var(--success); background: #f0fff4; }
        .check-mark { 
            position: absolute; bottom: 8px; right: 8px; background: var(--success); color: white; 
            width: 20px; height: 20px; border-radius: 50%; display: none; align-items: center; justify-content: center; font-size: 10px; 
        }
        .diamond-item.active .check-mark { display: flex; }

        .payment-box { background: white; border-radius: 18px; padding: 12px 15px; display: flex; justify-content: space-between; align-items: center; cursor: pointer; border: 3px solid transparent; }
        .payment-box.active { border-color: var(--success); }
        .check-circle { background: #cbd5e1; color: white; width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; }
        .payment-box.active .check-circle { background: var(--success); }

        .terms-wrapper { margin-top: 15px; display: flex; gap: 8px; font-size: 12px; align-items: flex-start; }
        .terms-wrapper input { accent-color: var(--success); margin-top: 3px; }

        .bottom-bar { 
            position: fixed; bottom: 0; left: 0; right: 0; background: #1e293b; 
            padding: 15px 25px; display: flex; justify-content: space-between; align-items: center; 
            border-radius: 25px 25px 0 0; box-shadow: 0 -5px 20px rgba(0,0,0,0.2);
        }
        .price-label { color: #94a3b8; font-size: 11px; }
        .price-value { color: var(--primary-light); font-family: 'Poppins'; font-size: 24px; font-weight: 800; }
        .btn-pay { 
            background: #475569; color: #94a3b8; padding: 12px 25px; border-radius: 25px; 
            border: none; font-weight: bold; cursor: not-allowed; transition: 0.3s;
        }
        .btn-pay.ready { background: var(--success); color: white; cursor: pointer; box-shadow: 0 4px 12px rgba(110, 188, 81, 0.3); }

        #resName { margin-top: 12px; text-align: center; font-weight: bold; display: none; font-size: 14px; background: rgba(255,255,255,0.1); padding: 8px; border-radius: 10px; }
    </style>
</head>
<body>

    <header onclick="window.location.href='/'">
        <div class="profile-info">
            <img src="../../IMG/IMG_0259.jpeg" class="profile-img">
            <div class="brand-text">
                <b>M·RX TOPUP</b>
                <span>គុណភាព • សុវត្ថិភាព</span>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="banner-card">
            <img src="../../IMG/IMG_0357.jpeg" alt="Banner">
        </div>

        <div class="game-info-card">
            <img src="../../IMG/IMG_0359.jpg" class="game-icon">
            <div>
                <h3 style="color:var(--primary-dark); font-size: 17px;">MOBILE LEGENDS | ខ្មែរ</h3>
                <p style="font-size: 12px; color: #64748b;">Moonton</p>
                <div class="instant-badge">✔ Instant Delivery</div>
            </div>
        </div>

        <div class="step-card">
            <div class="step-header">
                <div class="step-num">1</div>
                <b>បញ្ចូលព័ត៌មានគណនី</b>
            </div>
            <div class="input-row">
                <div class="input-field"><span>#</span><input type="number" id="uId" placeholder="User ID"></div>
                <div class="input-field" style="flex:0.7;"><span>()</span><input type="number" id="zId" placeholder="Zone"></div>
            </div>
            <button class="btn-check-id" onclick="checkID()">ត្រួតពិនិត្យគណនី</button>
            <div id="resName"></div>
        </div>

        <div class="step-card">
            <div class="step-header">
                <div class="step-num">2</div>
                <b>ជ្រើសរើសកញ្ចប់ពេជ្រ</b>
            </div>
            <div class="diamond-grid">
                <?php foreach($packages as $pkg): ?>
                <div class="diamond-item" data-price="<?= $pkg['price'] ?>" data-name="<?= $pkg['amount'] ?>">
                    <b><?= $pkg['amount'] ?></b>
                    <span>$<?= number_format($pkg['price'], 2) ?></span>
                    <div class="check-mark">✔</div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="step-card">
            <div class="step-header">
                <div class="step-num">3</div>
                <b>វិធីបង់ប្រាក់</b>
            </div>
            <div class="payment-box" id="abaBox" onclick="selectPay()">
                <div style="display:flex; align-items:center; gap:10px;">
                    <img src="../../IMG/IMG_0434.jpeg" width="30">
                    <b style="color:#333; font-size:14px;">KHQR / ABA Pay</b>
                </div>
                <div class="check-circle">✔</div>
            </div>
            <div class="terms-wrapper">
                <input type="checkbox" id="terms" checked onchange="updateBtn()">
                <label style="cursor: pointer;">ខ្ញុំយល់ព្រមលើលក្ខខណ្ឌប្រតិបត្តិ</label>
            </div>
        </div>
    </div>

    <form id="topupForm" action="../../api/chackout.php" method="POST" style="display:none;">
        <input type="hidden" name="user_id" id="hidden_uId">
        <input type="hidden" name="server_id" id="hidden_zId">
        <input type="hidden" name="diamonds" id="hidden_pkg">
        <input type="hidden" name="price" id="hidden_price">
    </form>

    <div class="bottom-bar">
        <div>
            <p class="price-label">តម្លៃសរុប</p>
            <h2 id="totalPrice" class="price-value">$0.00</h2>
        </div>
        <button class="btn-pay" id="payBtn" disabled onclick="processPay()">បង់ប្រាក់ឥឡូវនេះ</button>
    </div>

    <script>
        let verified = false, selectedPrice = 0, selectedPkg = "", paySelected = false;

        async function checkID() {
            const u = document.getElementById('uId').value, z = document.getElementById('zId').value;
            const out = document.getElementById('resName');
            if(!u || !z) return;
            out.style.display = "block"; out.innerText = "កំពុងឆែក...";
            try {
                const res = await fetch(`https://api.isan.eu.org/nickname/ml?id=${u}&zone=${z}`);
                const data = await res.json();
                if(data.name) {
                    out.innerText = "✅ ឈ្មោះគណនី: " + data.name; verified = true;
                } else {
                    out.innerText = "❌ រកមិនឃើញ ID"; verified = false;
                }
            } catch { out.innerText = "⚠️ Error API"; verified = false; }
            updateBtn();
        }

        document.querySelectorAll('.diamond-item').forEach(item => {
            item.onclick = () => {
                document.querySelectorAll('.diamond-item').forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                selectedPrice = item.dataset.price;
                selectedPkg = item.dataset.name;
                document.getElementById('totalPrice').innerText = "$" + selectedPrice;
                updateBtn();
            }
        });

        function selectPay() {
            paySelected = !paySelected;
            document.getElementById('abaBox').classList.toggle('active', paySelected);
            updateBtn();
        }

        function updateBtn() {
            const btn = document.getElementById('payBtn');
            const terms = document.getElementById('terms').checked;
            if(verified && selectedPrice > 0 && paySelected && terms) {
                btn.disabled = false; btn.classList.add('ready');
            } else {
                btn.disabled = true; btn.classList.remove('ready');
            }
        }

        function processPay() {
            document.getElementById('hidden_uId').value = document.getElementById('uId').value;
            document.getElementById('hidden_zId').value = document.getElementById('zId').value;
            document.getElementById('hidden_pkg').value = selectedPkg;
            document.getElementById('hidden_price').value = selectedPrice;
            document.getElementById('topupForm').submit();
        }
    </script>
</body>
</html>
