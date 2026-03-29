

## 🐳 Docker Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/AbdelhamidShaheen/SmartShop.git
cd your-repo
```

---

### 2. Build and start containers

```bash
docker-compose up -d --build
```

---

### 3. Install dependencies

```bash
docker-compose exec app composer install
docker-compose exec app npm install
```

---

### 4. Environment setup

```bash
cp .env.example .env
docker-compose exec app php artisan key:generate
```

---

### 5. Configure database

Update your `.env` file with database credentials (if needed), then run:

```bash
docker-compose exec app php artisan migrate --seed
```

---

### 5.1 Configure gemini api key or use in env.example

Update your `.env` gemini api key:


### 6. Compile frontend assets

```bash
docker-compose exec app npm run dev
```

---

### 7.1 Access the application
run queue worker to fire jobs that recommend products
```bash

docker-compose exec app php artisan queue:work 

```
---

### 7.1 Access the application

Open your browser:

```
http://localhost:8000
```

---

## 🐳 Docker Services

* **app** → Laravel PHP application
* **web** → Nginx server
* **db** → MySQL database
* **redis**  → caching/session

---

## 🤖 AI Recommendation System

### 🔹 API Used

**OpenAI API (Gemini)**


## 🧠 How It Works

1. Store user’s viewed products in session
2. Send product data to the AI API
3. AI returns recommended products
4. Display them in the **“Recommended for You”** section

---

## 🧾 Example Prompt Sent to AI

```
You are an e-commerce recommender. 
                   User history: [{"id":5,"name":"Noise Cancelling Headphones","description":"Over-ear headphones with active noise cancellation."},{"id":8,"name":"Portable Speaker","description":"Waterproof rugged speaker with deep bass."},{"id":17,"name":"Electric Kettle","description":"Fast-boil 1.7L glass kettle with LED indicator."}] ◀
                   Available products: [{"id":1,"name":"Mechanical Keyboard","description":"RGB Backlit mechanical keyboard with blue switches."},{"id":2,"name":"Wireless Gaming Mouse","description":"High-precision 16000 DPI sensor with ergonomic grip."},{"id":3,"name":"Ultrawide Monitor","description":"34-inch curved display for immersive productivity."},{"id":4,"name":"USB-C Docking Station","description":"10-in-1 hub with 4K HDMI and Power Delivery."},{"id":5,"name":"Noise Cancelling Headphones","description":"Over-ear headphones with active noise cancellation."},{"id":6,"name":"Bluetooth Earbuds","description":"True wireless earbuds with 24-hour battery life."},{"id":7,"name":"Studio Microphone","description":"Professional XLR condenser mic for podcasting."},{"id":8,"name":"Portable Speaker","description":"Waterproof rugged speaker with deep bass."},{"id":9,"name":"Smart Desk Lamp","description":"Adjustable color temperature with wireless charging base."},{"id":10,"name":"Electric Standing Desk","description":"Height adjustable desk with memory presets."},{"id":11,"name":"Ergonomic Office Chair","description":"Breathable mesh back with lumbar support."},{"id":12,"name":"Minimalist Leather Wallet","description":"RFID blocking slim wallet made of top-grain leather."},{"id":13,"name":"Yoga Mat","description":"Non-slip 6mm thick exercise mat for home workouts."},{"id":14,"name":"Stainless Steel Bottle","description":"Vacuum insulated 1L water bottle, keeps cold for 24h."},{"id":15,"name":"Adjustable Dumbbells","description":"Compact 5-in-1 weight system for strength training."},{"id":16,"name":"Foam Roller","description":"High-density foam roller for muscle recovery."},{"id":17,"name":"Electric Kettle","description":"Fast-boil 1.7L glass kettle with LED indicator."},{"id":18,"name":"French Press Coffee Maker","description":"BPA-free glass and stainless steel coffee press."},{"id":19,"name":"Air Purifier","description":"HEPA filter purifier for small to medium rooms."},{"id":20,"name":"Bamboo Cutting Board","description":"Set of 3 eco-friendly organic bamboo boards."},{"id":21,"name":"Hardshell Carry-on","description":"Lightweight suitcase with 360-degree spinner wheels."},{"id":22,"name":"Solar Power Bank","description":"20,000mAh battery with solar charging panels."},{"id":23,"name":"Portable Hammock","description":"Double camping hammock with reinforced straps."},{"id":24,"name":"LED Camping Lantern","description":"Rechargeable 1000 lumen lantern with SOS mode."},{"id":25,"name":"Dotted Journal","description":"A5 hardcover notebook for bullet journaling."},{"id":26,"name":"Fine Liner Pen Set","description":"12-pack of archival ink pens for sketching."},{"id":27,"name":"Laptop Stand","description":"Aluminum ventilated stand for better posture."},{"id":28,"name":"Desk Mat","description":"Extra large vegan leather desk pad."},{"id":29,"name":"Smart Plug","description":"WiFi enabled outlet compatible with Alexa and Google."},{"id":30,"name":"Wireless Charger Pad","description":"15W fast charging pad for Qi-enabled devices."},{"id":31,"name":"Webcam 1080p","description":"High-def camera with built-in privacy shutter."},{"id":32,"name":"External SSD 1TB","description":"High-speed portable drive for data backup."}] ◀
                   Return ONLY a JSON array of the top 3 recommended product IDs.

---


### Rebuild containers

```bash
docker-compose down -v
docker-compose up -d --build
```
