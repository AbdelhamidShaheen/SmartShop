<a href="{{ route('cart.show') }}"
    class="relative ml-4 bg-purple-500 hover:bg-purple-600 text-white px-3 py-2 rounded-lg flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h14l-2-9M9 21h6" />
    </svg>
    <span
        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
        {{ $count }}
    </span>
    Cart
</a>
