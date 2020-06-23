<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product as ProductRequest;
use App\Repositories\Interfaces\AdminInterface;

class ProductController extends Controller
{
    private $model;

    public function __construct(AdminInterface $model)
    {
        $this->model = $model;
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
        $this->model->productStore($request);
        return view('admin.product.index')->withStatus('Add Success');
    }

    public function show($product)
    {
        $product = $this->model->productShow($product);
        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $product)
    {
        $this->model->productUpdate($request, $product);
        return view('admin.product.index')->withStatus('Update Success');
    }

    public function destroy($product)
    {
        $this->model->productDelete($product);
    }
}
