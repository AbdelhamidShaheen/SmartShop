<?php

namespace App\Livewire\Product;

use App\Http\Services\Interfaces\IRecommendationService;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListProducts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.products.list-products', [
            'products' => Product::paginate(8),
            'recommended_products' => app(IRecommendationService::class)->getRecommendations(Session::get('last_viewed_products', [])),
        ]);
    }
}
