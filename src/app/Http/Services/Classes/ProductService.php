<?php

namespace App\Http\Services\Classes;

use App\Http\Services\Interfaces\IProductService;
use App\Models\Product;

class ProductService implements IProductService
{

    public function getAllProducts()
    {
        return Product::paginate();
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }
}
