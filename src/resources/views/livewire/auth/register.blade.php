<div class="min-h-screen flex items-center justify-center px-4 bg-gray-100">

    <div class="max-w-5xl w-full bg-white shadow-2xl rounded-2xl grid md:grid-cols-2 overflow-hidden">

        <!-- Left -->
        <div class="bg-purple-600 text-white p-10 flex flex-col justify-center">
            <h2 class="text-4xl font-extrabold mb-4">SmartShop</h2>
            <p class="text-purple-100 mb-6">
                Join SmartShop and start shopping smarter.
            </p>

            <ul class="space-y-3 text-sm">
                <li>✔ Fast checkout</li>
                <li>✔ Exclusive discounts</li>
                <li>✔ Secure payments</li>
            </ul>
        </div>

        <!-- Right -->
        <div class="p-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Account</h2>

            <form wire:submit.prevent="register" class="space-y-4">

                <!-- Name -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Name</label>
                    <input type="text" wire:model="name"
                        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-purple-500">

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

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

                    <input :type="show ? 'text' : 'password'" wire:model="password"
                        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-purple-500">

                    <button type="button" @click="show = !show" class="text-sm text-purple-600 mt-1">
                        Show
                    </button>

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation"
                        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-purple-600 text-white py-2 rounded-xl hover:bg-purple-700 transition font-semibold">
                    Register
                </button>

                <!-- Login -->
                <p class="text-center text-sm text-gray-500 mt-4">
                    Already have an account?
                    <a href="{{ route('auth.login') }}" class="text-purple-600 font-semibold hover:underline">
                        Login
                    </a>
                </p>
            </form>
        </div>

    </div>

</div>
