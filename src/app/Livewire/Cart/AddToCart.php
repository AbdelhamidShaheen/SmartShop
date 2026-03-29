<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;

class AddToCart extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart($productId)
    {
        $cart = session()->get('cart', []);

        $product = Product::find($productId);
        if (! $product) {
            return;
        }

        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.add-to-cart');
    }
}
