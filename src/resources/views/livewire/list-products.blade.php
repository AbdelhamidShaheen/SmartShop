<div x-data="{
    search: '',
}" class="max-w-7xl mx-auto px-6 py-12">
    <!-- Title -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Our Products</h2>

    <!-- Search Bar -->
    <div class="mb-8 flex justify-center">
        <input type="text" x-model="search" placeholder="Search products..."
            class="w-full max-w-md px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500">
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($products as $product)
            <div x-show="('{{ strtolower($product->name) }}').includes(search.toLowerCase())" x-transition
                class="bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col">

                <!-- Product Image -->
                <a href="{{ route('products.show', $product->id) }}">
                    <div class="h-48 w-full overflow-hidden">
                        <img src="{{ $product->image ?? 'https://via.placeholder.com/400' }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                </a>

                <!-- Product Info -->
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $product->name }}
                        </h3>
                        <p class="text-purple-600 font-bold mt-2">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    </div>

                    <!-- Add to Cart -->
                    <div class="mt-4">
                        <button wire:click="addToCart({{ $product->id }})"
                            class="w-full bg-purple-600 text-white py-2 rounded-xl hover:bg-purple-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $products->links() }}
    </div>
</div>
