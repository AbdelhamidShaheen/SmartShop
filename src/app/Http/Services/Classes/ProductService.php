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

    public function createProduct(array $data)
    {
        $data['image'] = $data['image']->store("products","public"); // Set default image if not provided
        return Product::create($data);
    }


    public function updateProduct($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }


    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return $product;
    }
}
