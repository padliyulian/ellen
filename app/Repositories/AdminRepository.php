<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Interfaces\AdminInterface;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminInterface
{
    // product
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


    // order
    public function orderShow($id)
    {
        $order = Order::findOrFail($id);
        return $order;
    }

    public function orderUpdate($request, $id)
    {
        $order = Order::findOrFail($id);
        $order->product = $request->product;
        $order->total_order = $request->total_order;
        if ($order->update()) {
            return $order;
        }
    }

    public function orderDelete($id)
    {
        $order = Order::findOrFail($id);
        if ($order->delete()) {
            return $order;
        }
    }

    // user
    public function userShow($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function userUpdate($request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->update()) {
            return $user;
        }
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return $user;
        }
    }
}