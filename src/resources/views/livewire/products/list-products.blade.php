<div class="max-w-7xl mx-auto px-6">

    <!-- Hero Section -->
    <div class="bg-linear-to-r from-purple-600 to-indigo-600 text-white mt-6">
        <div class="max-w-7xl mx-auto px-6 py-20 text-center">

            <!-- Tagline -->
            <p class="text-sm uppercase tracking-widest text-purple-200 mb-4">
                Smart Shopping Starts Here
            </p>

            <!-- Heading -->
            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
                Discover Products You’ll Love
            </h1>

            <!-- Description -->
            <p class="max-w-2xl mx-auto text-lg text-purple-100 mb-8">
                Browse our collection and get personalized recommendations based on your interests.
            </p>

            <!-- Buttons -->
            <div class="flex justify-center gap-4">
                <a href="#products"
                    class="bg-white text-purple-600 font-semibold px-6 py-3 rounded-xl shadow hover:bg-gray-100 transition">
                    Shop Now
                </a>

                <a href="#recommended"
                    class="border border-white px-6 py-3 rounded-xl hover:bg-white hover:text-purple-600 transition">
                    Recommended
                </a>
            </div>

        </div>
    </div>

    <div class="py-12">
        <!-- Recommended Products -->
        @if (isset($recommended_products) && $recommended_products->isNotEmpty())
            <div id="recommended" class="max-w-7xl mx-auto px-6 mb-12">

                <!-- Section Header -->
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        🔥 Recommended for You
                    </h2>
                </div>

                <!-- Horizontal Scroll -->
                <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-hide">

                    @foreach ($recommended_products as $recommended_product)
                        <div
                            class="bg-white shadow-md rounded-2xl overflow-hidden flex flex-col hover:shadow-xl transition">

                            <!-- Image -->
                            <a href="{{ route('products.show', $recommended_product->id) }}">
                                <div class="h-40 w-full overflow-hidden">
                                    <img src="{{ $recommended_product->image ?? 'https://via.placeholder.com/400' }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                </div>
                            </a>

                            <!-- Info -->
                            <div class="p-4 flex flex-col justify-between flex-1">
                                <div>
                                    <h3 class="text-md font-semibold text-gray-800 line-clamp-1">
                                        {{ $recommended_product->name }}
                                    </h3>

                                    <p class="text-purple-600 font-bold mt-1">
                                        ${{ number_format($recommended_product->price, 2) }}
                                    </p>
                                </div>

                                <!-- Button -->

                                @livewire('cart.add-to-cart', ['product' => $recommended_product],key('add-to-cart-recommnded'.$recommended_product->id) )
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        @endif
        <div id="products" x-data="{
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
                                <img src="{{ $product->image ?? 'https://via.placeholder.com/400' }}"
                                    alt="{{ $product->name }}"
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
                                @livewire('cart.add-to-cart', ['product' => $product],key('add-to-cart-'.$product->id))

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
    </div>


</div>
