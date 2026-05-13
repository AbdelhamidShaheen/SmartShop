<?php

namespace App\Http\Services\Interfaces;

interface IProductService
{
    public function getAllProducts();

    public function getProductById($id);
}
