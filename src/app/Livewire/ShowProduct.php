<?php

namespace App\Livewire;

use App\Models\Product;
use App\Traits\CartFunctions;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowProduct extends Component
{
    use CartFunctions;
    
    public Product $product;

    public function mount($productId)
    {
        $this->product = Product::findOrFail($productId);
    }

    public function render()
    {
        return view('livewire.show-product');
    }
}
