<div>
    <div
        class="max-w-5xl mx-auto p-6 mb-8 mt-10">
        <div class="grid md:grid-cols-2 gap-8 bg-white shadow rounded-2xl p-6">

            <!-- Image -->
            <div>
                <img src="{{ $product->image ?? 'https://via.placeholder.com/400' }}" alt="{{ $product->name }}"
                    class="rounded-xl w-full object-cover">
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
                    @livewire('cart.add-to-cart', ['product' => $product])
                   
                </div>

            </div>
        </div>
    </div>






    <!-- You Might Also Like -->
    @if (isset($related_products) && $related_products->isNotEmpty())
        <div class="max-w-5xl mx-auto px-6 mb-12">

            <!-- Header -->
            <h2 class="text-xl font-bold text-gray-800 mb-6">
                💡 You might also like
            </h2>

            <!-- Horizontal Scroll -->
            <div class="flex gap-4 overflow-x-auto pb-4 scrollbar-hide">

                @foreach ($related_products as $item)
                    <div class="min-w-40 bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">

                        <!-- Image -->
                        <a href="{{ route('products.show', $item->id) }}">
                            <div class="h-28 w-full overflow-hidden">
                                <img src="{{ $item->image ?? 'https://via.placeholder.com/400' }}"
                                    class="w-full h-full object-cover hover:scale-105 transition duration-300">
                            </div>
                        </a>

                        <!-- Info -->
                        <div class="p-3">
                            <h3 class="text-sm font-semibold text-gray-800 truncate">
                                {{ $item->name }}
                            </h3>

                            <p class="text-purple-600 text-sm font-bold mt-1">
                                ${{ number_format($item->price, 2) }}
                            </p>

                            <!-- Add -->

                            @livewire('cart.add-to-cart', ['product' => $item])

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    @endif
</div>
