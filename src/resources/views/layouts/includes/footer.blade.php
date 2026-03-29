<!-- resources/views/components/footer.blade.php -->
<footer class="bg-gray-900 text-gray-300 py-12">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">

        <!-- Brand / Logo -->
        <div>
            <h2 class="text-white text-2xl font-bold mb-4">SmartShop</h2>
            <p class="text-gray-400">Your one-stop shop for premium products and great deals. Shop smarter, live better.</p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-white font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('products.list') }}" class="hover:text-white transition">Products</a></li>
            </ul>
        </div>

        <!-- Account Links -->
        <div>
            <h3 class="text-white font-semibold mb-4">Account</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('auth.login') }}" class="hover:text-white transition">Login</a></li>
                <li><a href="{{ route('auth.register') }}" class="hover:text-white transition">Register</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div>
            <h3 class="text-white font-semibold mb-4">Subscribe</h3>
            <p class="text-gray-400 mb-4">Get the latest updates and offers.</p>
            <form class="flex flex-col sm:flex-row gap-2">
                <input type="email" placeholder="Your email" class="w-full px-4 py-2 rounded-lg text-gray-900 focus:outline-none">
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">Subscribe</button>
            </form>

            <!-- Socials -->
            <div class="flex space-x-4 mt-6">
                <a href="#" class="hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

    </div>

    <!-- Bottom copyright -->
    <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} SmartShop. All rights reserved.
    </div>
</footer>