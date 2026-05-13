<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Services\Interfaces\IProductService;

class ProductController extends Controller
{
    public function __construct(public IProductService $productService)
    {
        //
    }

    public function index()
    {

        return ProductResource::collection($this->productService->getAllProducts());
        //
    }



    public function show($id)
    {
        //
        return $this->success(new ProductResource($this->productService->getProductById($id)));
    }
    //
}
