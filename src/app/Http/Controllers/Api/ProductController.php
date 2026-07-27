<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
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

    public function store(StoreProductRequest $request)
    {
        //
        return $this->success(new ProductResource($this->productService->createProduct($request->validated())));
    }


    public function show($id)
    {
        //
        return $this->success(new ProductResource($this->productService->getProductById($id)));
    }


    public function update(StoreProductRequest $request, $id)
    {
        //
        return $this->success(new ProductResource($this->productService->updateProduct($id, $request->validated())));
    }


    public function destroy($id)
    {
        //
        return $this->success(new ProductResource($this->productService->deleteProduct($id)));
    }
    //
}
