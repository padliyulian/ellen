<?php

namespace App\Http\Controllers\Admin\Api\v1;

use App\Http\Controllers\Controller;
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
        $products = $this->productService->productLists();
        return $products;
    }
}
