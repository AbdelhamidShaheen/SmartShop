<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowCart extends Component

{
    public $cart = [];

    protected $listeners = ['addToCart'];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

  

    public function removeFromCart($productId)
    {
        unset($this->cart[$productId]);
        session()->put('cart', $this->cart);
        $this->cart = session()->get('cart', []);
        $this->dispatch('cartUpdated');
    }

    public function updateQuantity($productId, $quantity)
    {
        if ($quantity < 1) return;
        $this->cart[$productId]['quantity'] = $quantity;
        session()->put('cart', $this->cart);
    }

    public function getTotalProperty()
    {
        return collect($this->cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function render()
    {
        return view('livewire.show-cart');
    }
}
