<?php

namespace App\Http\Services\Classes;

use App\Http\Services\Interfaces\IProductService;
use App\Models\Product;

class ProductService implements IProductService
{

    public function getAllProducts()
    {
        return Product::paginate(request()->query('per_page', 15));
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }
}
