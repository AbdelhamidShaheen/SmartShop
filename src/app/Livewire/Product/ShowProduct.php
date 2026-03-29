<?php

namespace App\Livewire\Product;

use App\Http\Services\Interfaces\IRecommendationService;
use App\Jobs\ProductsRecomendations;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowProduct extends Component
{
    public Product $product;

    public function mount($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->registerViews();
    }

    private function registerViews()
    {
        $lastViewedProducts = collect(Session::get('last_viewed_products', []));
        // Check if product already registered
        if ($lastViewedProducts->contains($this->product->id)) {
            return;
        }
        $lastViewedProducts->push($this->product->id);
        // Remove old items
        if ($lastViewedProducts->count() > 3) {
            $lastViewedProducts->shift();
        }
        Session::put('last_viewed_products', $lastViewedProducts->toArray());
        // Dispatch to load product recommendations
        ProductsRecomendations::dispatch(Session::get('last_viewed_products', []));
    }

    public function render()
    {
        return view('livewire.products.show-product', [
            'related_products' => app(IRecommendationService::class)->getRecommendations([$this->product->id]),
        ]);
    }
}
