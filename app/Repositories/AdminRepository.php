<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Interfaces\AdminInterface;

class AdminRepository implements AdminInterface
{
    public function productList($paginate)
    {

    }

    public function productStore($request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        if ($product->save()) {
            return $product;
        }
    }

    public function productShow($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function productUpdate($request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        if ($product->update()) {
            return $product;
        }
    }

    public function productDelete($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return $product;
        }
    }
}