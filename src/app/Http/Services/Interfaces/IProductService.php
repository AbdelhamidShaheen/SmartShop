<?php

namespace App\Http\Services\Interfaces;

interface IProductService
{
    public function getAllProducts();

    public function getProductById($id);

    public function createProduct(array $data);

    public function updateProduct($id, array $data);    

    public function deleteProduct($id);
}
