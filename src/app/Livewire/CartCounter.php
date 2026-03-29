<?php

namespace App\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->count = count(session('cart', []));
    }

    public function updateCount()
    {
        $this->count = count(session('cart', []));
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }
}
