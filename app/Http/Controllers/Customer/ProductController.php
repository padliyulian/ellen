<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer as CustomerRequest;
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
        $products = $this->productService->productList(10);
        return view('public.index', compact('products'));
    }

    public function show($product)
    {
        $product = $this->productService->productDetail($product);
        return view('public.cart', compact('product'));
    }

    public function order(CustomerRequest $request)
    {
        $order = $this->productService->productOrder($request);
        return view('public.order', compact('order'))->withStatus('Success!');
    }
}