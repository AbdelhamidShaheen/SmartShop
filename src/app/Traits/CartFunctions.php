<?php

namespace App\Traits;

use App\Models\Product;

trait CartFunctions
{
    //
    public function addToCart($productId)
    {
        $cart = session()->get('cart', []);
        $product = Product::find($productId);
        if (!$product) return;

        if (isset($cart[$productId])) {
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
}
