<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (Product::exists()) {
            return;
        }

        $products = [
            // Tech & Computing
            ['name' => 'Mechanical Keyboard', 'description' => 'RGB Backlit mechanical keyboard with blue switches.', 'price' => 89.99, 'image' => 'https://images.unsplash.com/photo-1511467687858-23d96c32e4ae?w=500'],
            ['name' => 'Wireless Gaming Mouse', 'description' => 'High-precision 16000 DPI sensor with ergonomic grip.', 'price' => 59.50, 'image' => 'https://images.unsplash.com/photo-1527692153951-404f291079bb?w=500'],
            ['name' => 'Ultrawide Monitor', 'description' => '34-inch curved display for immersive productivity.', 'price' => 449.00, 'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500'],
            ['name' => 'USB-C Docking Station', 'description' => '10-in-1 hub with 4K HDMI and Power Delivery.', 'price' => 75.00, 'image' => 'https://images.unsplash.com/photo-1591488320449-011701bb6704?w=500'],

            // Audio
            ['name' => 'Noise Cancelling Headphones', 'description' => 'Over-ear headphones with active noise cancellation.', 'price' => 299.99, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500'],
            ['name' => 'Bluetooth Earbuds', 'description' => 'True wireless earbuds with 24-hour battery life.', 'price' => 129.00, 'image' => 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=500'],
            ['name' => 'Studio Microphone', 'description' => 'Professional XLR condenser mic for podcasting.', 'price' => 199.00, 'image' => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=500'],
            ['name' => 'Portable Speaker', 'description' => 'Waterproof rugged speaker with deep bass.', 'price' => 45.00, 'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=500'],

            // Lifestyle & Home
            ['name' => 'Smart Desk Lamp', 'description' => 'Adjustable color temperature with wireless charging base.', 'price' => 34.99, 'image' => 'https://images.unsplash.com/photo-1534073828943-f801091bb18c?w=500'],
            ['name' => 'Electric Standing Desk', 'description' => 'Height adjustable desk with memory presets.', 'price' => 380.00, 'image' => 'https://images.unsplash.com/photo-1595515106969-1ce29566ff1c?w=500'],
            ['name' => 'Ergonomic Office Chair', 'description' => 'Breathable mesh back with lumbar support.', 'price' => 249.00, 'image' => 'https://images.unsplash.com/photo-1580480055273-228ff5388ef8?w=500'],
            ['name' => 'Minimalist Leather Wallet', 'description' => 'RFID blocking slim wallet made of top-grain leather.', 'price' => 25.00, 'image' => 'https://images.unsplash.com/photo-1627123424574-724758594e93?w=500'],

            // Fitness & Wellness
            ['name' => 'Yoga Mat', 'description' => 'Non-slip 6mm thick exercise mat for home workouts.', 'price' => 35.00, 'image' => 'https://images.unsplash.com/photo-1592432676556-2693bc214b60?w=500'],
            ['name' => 'Stainless Steel Bottle', 'description' => 'Vacuum insulated 1L water bottle, keeps cold for 24h.', 'price' => 28.00, 'image' => 'https://images.unsplash.com/photo-1602143393494-14e910f39384?w=500'],
            ['name' => 'Adjustable Dumbbells', 'description' => 'Compact 5-in-1 weight system for strength training.', 'price' => 159.99, 'image' => 'https://images.unsplash.com/photo-1583454110551-21f2fa2ec617?w=500'],
            ['name' => 'Foam Roller', 'description' => 'High-density foam roller for muscle recovery.', 'price' => 19.99, 'image' => 'https://images.unsplash.com/photo-1600881333168-2ed49ad0cb95?w=500'],

            // Kitchen & Home
            ['name' => 'Electric Kettle', 'description' => 'Fast-boil 1.7L glass kettle with LED indicator.', 'price' => 42.50, 'image' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=500'],
            ['name' => 'French Press Coffee Maker', 'description' => 'BPA-free glass and stainless steel coffee press.', 'price' => 29.00, 'image' => 'https://images.unsplash.com/photo-1544190153-060cb6bb9dfc?w=500'],
            ['name' => 'Air Purifier', 'description' => 'HEPA filter purifier for small to medium rooms.', 'price' => 89.00, 'image' => 'https://images.unsplash.com/photo-1585771724684-2827dfff38f4?w=500'],
            ['name' => 'Bamboo Cutting Board', 'description' => 'Set of 3 eco-friendly organic bamboo boards.', 'price' => 24.99, 'image' => 'https://images.unsplash.com/photo-1584345604476-8ec5e12e42dd?w=500'],

            // Travel & Outdoor
            ['name' => 'Hardshell Carry-on', 'description' => 'Lightweight suitcase with 360-degree spinner wheels.', 'price' => 120.00, 'image' => 'https://images.unsplash.com/photo-1565026073747-483e9344400b?w=500'],
            ['name' => 'Solar Power Bank', 'description' => '20,000mAh battery with solar charging panels.', 'price' => 49.99, 'image' => 'https://images.unsplash.com/photo-1620216533129-994c63286782?w=500'],
            ['name' => 'Portable Hammock', 'description' => 'Double camping hammock with reinforced straps.', 'price' => 39.00, 'image' => 'https://images.unsplash.com/photo-1534008757030-27299c4371b6?w=500'],
            ['name' => 'LED Camping Lantern', 'description' => 'Rechargeable 1000 lumen lantern with SOS mode.', 'price' => 22.00, 'image' => 'https://images.unsplash.com/photo-1516534775068-ba3e84529ec1?w=500'],

            // Stationery & Productivity
            ['name' => 'Dotted Journal', 'description' => 'A5 hardcover notebook for bullet journaling.', 'price' => 15.99, 'image' => 'https://images.unsplash.com/photo-1531346878377-a5be20888e57?w=500'],
            ['name' => 'Fine Liner Pen Set', 'description' => '12-pack of archival ink pens for sketching.', 'price' => 18.50, 'image' => 'https://images.unsplash.com/photo-1583485088034-697b5bc54ccd?w=500'],
            ['name' => 'Laptop Stand', 'description' => 'Aluminum ventilated stand for better posture.', 'price' => 32.00, 'image' => 'https://images.unsplash.com/photo-1616353110393-942f2b740510?w=500'],
            ['name' => 'Desk Mat', 'description' => 'Extra large vegan leather desk pad.', 'price' => 26.00, 'image' => 'https://images.unsplash.com/photo-1616627547584-bf28cee262db?w=500'],

            // Miscellaneous Tech
            ['name' => 'Smart Plug', 'description' => 'WiFi enabled outlet compatible with Alexa and Google.', 'price' => 14.99, 'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?w=500'],
            ['name' => 'Wireless Charger Pad', 'description' => '15W fast charging pad for Qi-enabled devices.', 'price' => 21.00, 'image' => 'https://images.unsplash.com/photo-1586816832793-072215805ad3?w=500'],
            ['name' => 'Webcam 1080p', 'description' => 'High-def camera with built-in privacy shutter.', 'price' => 55.00, 'image' => 'https://images.unsplash.com/photo-1612285335132-159620612239?w=500'],
            ['name' => 'External SSD 1TB', 'description' => 'High-speed portable drive for data backup.', 'price' => 105.00, 'image' => 'https://images.unsplash.com/photo-1597740985671-2a8a3b80502e?w=500'],
        ];

        DB::table('products')->insert($products);
    }
}
