from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__, 
            template_folder='template', # កំណត់ទៅកាន់ folder template តាមរូបភាព
            static_folder='IMG')       # កំណត់ folder រូបភាពជា static

# --- ទិន្នន័យផលិតផល (គ្រប់គ្រងតម្លៃនៅទីនេះ) ---
games_config = {
    "mobile": {
        "name": "Mobile Legends",
        "packages": [
            {"name": "86 Diamonds", "price": 1.55},
            {"name": "706 Diamonds", "price": 12.50}
        ]
    },
    "freefire": {
        "name": "Free Fire",
        "packages": [
            {"name": "100 Diamonds", "price": 1.00},
            {"name": "530 Diamonds", "price": 5.00}
        ]
    }
}

# 1. Route សម្រាប់ទំព័រដើម (Index)
@app.route('/')
def index():
    return render_template('index.html')

# 2. Route សម្រាប់ទំព័រហ្គេមនីមួយៗ (Dynamic Route)
@app.route('/game/<game_name>')
def game_detail(game_name):
    game = games_config.get(game_name)
    if not game:
        return "រកមិនឃើញហ្គេមនេះទេ!", 404
    
    # បញ្ជូនទៅកាន់ file ក្នុង template/game/
    return render_template(f'game/{game_name}.html', game=game)

# 3. Route សម្រាប់ Checkout (ទទួលទិន្នន័យពី Form)
@app.route('/api/checkout', methods=['POST'])
def checkout():
    user_id = request.form.get('user_id')
    zone_id = request.form.get('server_id')
    package = request.form.get('diamonds')
    price = request.form.get('price')
    
    # កន្លែងនេះអ្នកអាចដាក់ Logic ផ្ញើសារទៅ Telegram ដូចក្នុង PHP បាន
    print(f"Order: {package} for ID: {user_id}({zone_id}) price: {price}")
    
    # បញ្ជូនទៅកាន់ទំព័របង់ប្រាក់ (QR Pay)
    return redirect("https://khqr.cc/api/payment/...")

# 4. Route សម្រាប់ Success Page
@app.route('/api/success')
def success():
    return render_template('api/success.html')

if __name__ == '__main__':
    app.run(debug=True)
