<!-- resources/views/components/header-hero.blade.php -->
<div class="relative bg-purple-600">
    <!-- Navbar -->
    <header class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
        <!-- Brand -->
        <div class="text-white text-2xl font-bold"><a href="{{ route('products.list') }}">SmartShop</a></div>

        <!-- Navigation + Cart -->
        <nav class="flex items-center space-x-4">
            @auth
                <span class="text-white font-semibold">
                    {{ auth()->user()->name }}
                </span>
                @livewire('auth.logout')
            @else
                <a href="{{ route('auth.login') }}" class="text-white hover:text-gray-200 font-semibold">Login</a>
                <a href="{{ route('auth.register') }}"
                    class="bg-white text-purple-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition">Register</a>
            @endauth


            <!-- Cart Button with Counter -->
            @livewire('cart-counter')


        </nav>
    </header>


</div>
