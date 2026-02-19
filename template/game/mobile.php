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

        /* Header Section - ចុចទៅ Home */
        header {
            background: var(--primary-dark);
            padding: 12px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            cursor: pointer; /* បង្ហាញថាអាចចុចបាន */
        }
        .profile-info { display: flex; align-items: center; gap: 10px; }
        .profile-img { width: 45px; height: 45px; border-radius: 50%; border: 2px solid white; object-fit: cover; }
        .brand-text b { display: block; font-size: 16px; }
        .brand-text span { font-size: 11px; opacity: 0.8; }

        .container { padding: 15px; max-width: 500px; margin: auto; }

        /* Banner & Info Card */
        .banner-card { width: 100%; border-radius: 25px; overflow: hidden; margin-bottom: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .banner-card img { width: 100%; display: block; }

        .game-info-card { background: white; border-radius: 20px; padding: 15px; display: flex; align-items: center; gap: 15px; margin-bottom: 20px; }
        .game-icon { width: 65px; height: 65px; border-radius: 15px; object-fit: cover; }
        .instant-badge { font-size: 12px; color: var(--success); display: flex; align-items: center; gap: 4px; font-weight: bold; margin-top: 4px; }

        /* Step Cards Style */
        .step-card { background: var(--primary-dark); border-radius: 25px; padding: 25px 20px; color: white; margin-bottom: 20px; }
        .step-header { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
        .step-num { 
            background: white; color: var(--primary-dark); 
            width: 32px; height: 32px; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; 
            font-weight: 800; font-family: 'Poppins';
        }

        /* Step 01 Inputs */
        .input-row { display: flex; gap: 12px; margin-bottom: 15px; }
        .input-field { background: white; border-radius: 15px; display: flex; align-items: center; padding: 14px 15px; gap: 8px; flex: 1; }
        .input-field span { color: #ccc; font-weight: bold; font-size: 18px; }
        .input-field input { border: none; outline: none; width: 100%; font-size: 18px; font-weight: bold; color: #333; }
        .btn-check-id { 
            width: 100%; background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.4); 
            border-radius: 15px; padding: 14px; color: white; font-weight: bold; cursor: pointer; transition: 0.3s;
        }
        .btn-check-id:active { background: rgba(255,255,255,0.3); }

        /* Step 02 Diamond Grid */
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

        /* Step 03 Payment Box */
        .payment-box { background: white; border-radius: 18px; padding: 12px 15px; display: flex; justify-content: space-between; align-items: center; cursor: pointer; border: 3px solid transparent; }
        .payment-box.active { border-color: var(--success); }
        .check-circle { background: #cbd5e1; color: white; width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; }
        .payment-box.active .check-circle { background: var(--success); }

        /* Checkbox Terms */
        .terms-wrapper { margin-top: 15px; display: flex; gap: 8px; font-size: 12px; align-items: flex-start; }
        .terms-wrapper input { accent-color: var(--success); margin-top: 3px; }

        /* Bottom Checkout Bar */
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

    <header onclick="window.location.href='index.html'">
        <div class="profile-info">
            <img src="IMG_0259.jpeg" class="profile-img">
            <div class="brand-text">
                <b>M·RX TOPUP</b>
                <span>គុណភាព • សុវត្ថិភាព</span>
            </div>
        </div>
        <div style="font-size: 20px;"></div>
    </header>

    <div class="container">
        <div class="banner-card">
            <img src="IMG_0357.jpeg" alt="Banner">
        </div>

        <div class="game-info-card">
            <img src="IMG_0359.jpg" class="game-icon">
            <div>
                <h3 style="color:var(--primary-dark); font-size: 17px;">MOBILE LEGENDS | ខ្មែរ</h3>
                <p style="font-size: 12px; color: #64748b;">Moonton</p>
                <div class="instant-badge">✔ Instant Delivery</div>
            </div>
        </div>

        <div class="step-card">
            <div class="step-header">
                <div class="step-num">1</div>
                <b style="font-size: 16px;">បញ្ចូលព័ត៌មានគណនី (Account Info)</b>
            </div>
            <div class="input-row">
                <div class="input-field"><span>#</span><input type="number" id="uId" placeholder="User ID"></div>
                <div class="input-field" style="flex:0.7;"><span>()</span><input type="number" id="zId" placeholder="Zone"></div>
            </div>
            <button class="btn-check-id" onclick="checkID()">ត្រួតពិនិត្យគណនី (Check ID)</button>
            <div id="resName"></div>
        </div>

        <div class="step-card">
            <div class="step-header">
                <div class="num-badge step-num">2</div>
                <b style="font-size: 16px;">ជ្រើសរើសកញ្ចប់ពេជ្រ</b>
            </div>
            <div class="diamond-grid">
                <div class="diamond-item" data-price="1.55"><b>86 Diamonds</b><span>$1.55</span><div class="check-mark">✔</div></div>
                <div class="diamond-item" data-price="12.50"><b>706 Diamonds</b><span>$12.50</span><div class="check-mark">✔</div></div>
                <div class="diamond-item" data-price="18.50"><b>1050 Diamonds</b><span>$18.50</span><div class="check-mark">✔</div></div>
                <div class="diamond-item" data-price="37.00"><b>2195 Diamonds</b><span>$37.00</span><div class="check-mark">✔</div></div>
            </div>
        </div>

        <div class="step-card">
            <div class="step-header">
                <div class="step-num">3</div>
                <b style="font-size: 16px;">វិធីបង់ប្រាក់ (Payment Method)</b>
            </div>
            <div class="payment-box" id="abaBox" onclick="selectPay()">
                <div style="display:flex; align-items:center; gap:10px;">
                    <img src="IMG_0434.jpeg" width="30">
                    <b style="color:#333; font-size:14px;">KHQR / ABA Pay</b>
                </div>
                <div class="check-circle">✔</div>
            </div>
            <div class="terms-wrapper">
                <input type="checkbox" id="terms" checked onchange="updateBtn()">
                <label style="cursor: pointer;">ខ្ញុំបានអាន និងយល់ព្រមលើ <span style="color:#FFD700; text-decoration:underline;" onclick="alert('លក្ខខណ្ឌប្រតិបត្តិ')">លក្ខខណ្ឌប្រតិបត្តិ</span> និង <span style="color:#FFD700; text-decoration:underline;" onclick="alert('គោលការណ៍ទិញ')">គោលការណ៍ទិញ។</span></label>
            </div>
        </div>
    </div>

    <div class="bottom-bar">
        <div>
            <p class="price-label">តម្លៃសរុបត្រូវបង់</p>
            <h2 id="totalPrice" class="price-value">$0.00</h2>
        </div>
        <button class="btn-pay" id="payBtn" disabled onclick="processPay()">បង់ប្រាក់ឥឡូវនេះ</button>
    </div>

    <script>
        let verified = false, selectedPrice = 0, paySelected = false;

        async function checkID() {
            const u = document.getElementById('uId').value, z = document.getElementById('zId').value;
            const out = document.getElementById('resName');
            if(!u || !z) return;
            
            out.style.display = "block";
            out.innerText = "កំពុងឆែក...";
            
            try {
                const res = await fetch(`https://api.isan.eu.org/nickname/ml?id=${u}&zone=${z}`);
                const data = await res.json();
                if(data.name) {
                    out.innerText = "✅ ឈ្មោះគណនី: " + data.name;
                    out.style.color = "white";
                    verified = true;
                } else {
                    out.innerText = "❌ រកមិនឃើញ ID នេះទេ";
                    out.style.color = "#ff8888";
                    verified = false;
                }
            } catch {
                out.innerText = "⚠️ Error API";
                verified = false;
            }
            updateBtn();
        }

        document.querySelectorAll('.diamond-item').forEach(item => {
            item.onclick = () => {
                document.querySelectorAll('.diamond-item').forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                selectedPrice = item.dataset.price;
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
                btn.disabled = false;
                btn.classList.add('ready');
            } else {
                btn.disabled = true;
                btn.classList.remove('ready');
            }
        }

        function processPay() {
            alert("កំពុងបញ្ជូនទៅកាន់ ABA Pay ដើម្បីបង់ប្រាក់ចំនួន $" + selectedPrice);
        }
    </script>
</body>
</html>
