from flask import Flask, render_template, request, redirect

app = Flask(__name__, template_folder='.') # កំណត់ឱ្យវាអាន template ពី root

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/mobile')
def mobile():
    # វានឹងទៅបើក file mobile.html នៅក្នុង folder template/game/
    return render_template('template/game/mobile.html')

@app.route('/api/chackout', methods=['POST'])
def checkout():
    # ទទួលទិន្នន័យពី Form
    user_id = request.form.get('user_id')
    zone_id = request.form.get('server_id')
    amount = request.form.get('price')
    
    # Logic សម្រាប់បាញ់ទៅ QR Pay (ឧទាហរណ៍)
    return redirect(f"https://khqr.cc/api/payment/fQLaAyCi6YyyCI1jMxcfyANOrvhp2Zbr?amount={amount}")

if __name__ == '__main__':
    app.run(debug=True)
