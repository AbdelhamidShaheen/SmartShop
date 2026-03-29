<?php

namespace App\Livewire;

use App\Models\Product;
use App\Traits\CartFunctions;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListProducts extends Component
{
    use WithPagination,CartFunctions;

 


    public function render()
    {
        return view('livewire.list-products', [
            "products" => Product::paginate(8)
        ]);
    }


  
}
