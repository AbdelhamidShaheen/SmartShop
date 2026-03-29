<div class="max-w-4xl mx-auto px-6 py-12">

    @if ($orderSuccess)
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-xl">
            ✅ Order confirmed! Thank you for your purchase 🎉
        </div>
    @endif
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Shopping Cart</h2>

    @if (count($cart) === 0)
        <p class="text-gray-500">Your cart is empty.</p>
        <a href="{{ route('products.list') }}" class="mt-4 inline-block text-purple-600 hover:underline">Continue
            Shopping</a>
    @else
        <div class="bg-white shadow rounded-xl p-6">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left border-b">
                        <th class="pb-2">Product</th>
                        <th class="pb-2">Price</th>
                        <th class="pb-2">Quantity</th>
                        <th class="pb-2">Subtotal</th>
                        <th class="pb-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr class="border-b">
                            <td class="py-3">{{ $item['name'] }}</td>
                            <td class="py-3">${{ number_format($item['price'], 2) }}</td>
                            <td class="py-3">
                                <div x-data="{ qty: {{ $item['quantity'] }} }" class="flex items-center gap-2">

                                    <!-- Decrease -->
                                    <button
                                        @click="if(qty > 1) { qty--; $wire.updateQuantity({{ $id }}, qty) }"
                                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">
                                        -
                                    </button>

                                    <!-- Quantity Display -->
                                    <span class="w-6 text-center" x-text="qty"></span>

                                    <!-- Increase -->
                                    <button @click="qty++; $wire.updateQuantity({{ $id }}, qty)"
                                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">
                                        +
                                    </button>

                                </div>
                            </td>
                            <td class="py-3">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td class="py-3">
                                <button wire:click="removeFromCart({{ $id }})"
                                    class="text-purple-500 hover:underline">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-between items-center font-bold text-lg">
                <span>Total:</span>
                <span>${{ number_format($this->total, 2) }}</span>
            </div>

            <div class="mt-6">
                <button wire:click="checkout()"
                    class="bg-purple-600 text-white py-2 px-6 rounded-xl hover:bg-purple-700 transition">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    @endif
</div>
