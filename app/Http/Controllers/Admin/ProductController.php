<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product as ProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function store(ProductRequest $request)
    {
        $this->productService->productStore($request);
        return view('admin.product.index')->withStatus('Add Success');
    }

    public function show($product)
    {
        $product = $this->productService->productDetail($product);
        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $product)
    {
        $this->productService->productUpdate($request, $product);
        return view('admin.product.index')->withStatus('Update Success');
    }

    public function destroy($product)
    {
        $this->productService->productDelete($product);
    }
}
