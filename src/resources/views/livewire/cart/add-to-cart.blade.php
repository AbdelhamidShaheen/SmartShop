  {{-- <button wire:click="addToCart({{ $product->id }})"
      class="mt-3 bg-purple-600 text-white py-2 px-2 rounded-xl hover:bg-purple-700 transition text-sm">
      Add to Cart
  </button> --}}

  <div>
      <button wire:click="addToCart({{ $product->id }})" wire:loading.delay.attr="disabled"
          wire:target="addToCart({{ $product->id }})"
          class="w-full mt-3 bg-purple-600 text-white py-2 px-2 rounded-xl hover:bg-purple-700 transition text-sm">
          <span wire:loading.delay.longest wire:target="addToCart({{ $product->id }})">
              Adding...
          </span>
          <span wire:loading.remove wire:target="addToCart({{ $product->id }})">
              Add to Cart
          </span>
      </button>
  </div>
