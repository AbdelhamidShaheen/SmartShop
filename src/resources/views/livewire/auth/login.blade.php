<div class="min-h-screen flex items-center justify-center px-4 bg-gray-100">

    <div class="max-w-5xl w-full bg-white shadow-2xl rounded-2xl grid md:grid-cols-2 overflow-hidden">

        <!-- Left -->
        <div class="bg-purple-600 text-white p-10 flex flex-col justify-center">
            <h2 class="text-4xl font-extrabold mb-4">SmartShop</h2>
            <p class="text-purple-100 mb-6">
                Welcome back! Login to continue shopping.
            </p>

            <ul class="space-y-3 text-sm">
                <li>✔ Fast checkout</li>
                <li>✔ Track orders</li>
                <li>✔ Exclusive offers</li>
            </ul>
        </div>

        <!-- Right -->
        <div class="p-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h2>

            <form wire:submit.prevent="login" class="space-y-4">

                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Email</label>
                    <input type="email" wire:model="email"
                        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-purple-500">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div x-data="{ show: false }">
                    <label class="block text-sm text-gray-600 mb-1">Password</label>

                    <input :type="show ? 'text' : 'password'"
                        wire:model="password"
                        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-purple-500">

                    <div class="flex justify-between mt-1">
                        <button type="button" @click="show = !show" class="text-sm text-purple-600">
                            Show
                        </button>

                    
                    </div>

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember -->
                <div class="flex items-center">
                    <input type="checkbox" wire:model="remember" class="mr-2">
                    <span class="text-sm text-gray-600">Remember me</span>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-purple-600 text-white py-2 rounded-xl hover:bg-purple-700 transition">
                    Login
                </button>

                <!-- Register -->
                <p class="text-center text-sm text-gray-500 mt-4">
                    Don’t have an account?
                    <a href="{{ route('auth.register') }}" class="text-purple-600 font-semibold">
                        Register
                    </a>
                </p>
            </form>
        </div>

    </div>
</div>