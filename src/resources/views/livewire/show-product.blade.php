<div 
    x-data="{ added: false }"
    @cart-updated.window="added = true; setTimeout(() => added = false, 2000)"
    class="max-w-5xl mx-auto p-6 mb-8 mt-10"
>
    <div class="grid md:grid-cols-2 gap-8 bg-white shadow rounded-2xl p-6">
        
        <!-- Image -->
        <div>
            <img 
                src="{{ $product->image ?? 'https://via.placeholder.com/400' }}" 
                alt="{{ $product->name }}"
                class="rounded-xl w-full object-cover"
            >
        </div>

        <!-- Info -->
        <div class="flex flex-col justify-between">
            
            <div>
                <h1 class="text-2xl font-bold mb-4">
                    {{ $product->name }}
                </h1>

                <p class="text-gray-600 mb-6">
                    {{ $product->description }}
                </p>

                <div class="text-3xl font-semibold text-purple-600 mb-6">
                    ${{ number_format($product->price, 2) }}
                </div>
            </div>

            <!-- Button -->
            <div>
                <button 
                    wire:click="addToCart({{ $product->id }})"
                    class="w-full bg-purple-600 text-white py-3 rounded-xl hover:bg-purple-700 transition"
                >
                    Add to Cart
                </button>

                <p 
                    x-show="added"
                    x-transition
                    class="text-green-600 mt-3"
                >
                    ✅ Added to cart!
                </p>
            </div>

        </div>
    </div>
</div>