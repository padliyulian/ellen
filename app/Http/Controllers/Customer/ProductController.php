<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\Customer;
use App\Repositories\Interfaces\ClientInterface;

class ProductController extends Controller
{
    private $model;

    public function __construct(ClientInterface $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $products = $this->model->productList(10);
        return view('public.index', compact('products'));
    }

    public function show($product)
    {
        $product = $this->model->productDetail($product);
        return view('public.cart', compact('product'));
    }

    public function order(Customer $request)
    {
        $order = $this->model->productOrder($request);
        return view('public.order', compact('order'))->with('status', 'Success!');
    }
}