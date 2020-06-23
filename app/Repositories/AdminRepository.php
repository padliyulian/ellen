<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Interfaces\AdminInterface;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Datatables;

class AdminRepository implements AdminInterface
{
    // product
    public function productList()
    {
        $product = Product::query();
        if ($product) {
            return DataTables::of($product)
            ->addColumn('action', function ($product) {
                return view('admin.product.action', [
                    'product' => $product,
                    'url_edit' => route('product-admin.show', $product->id),
                    'url_destroy' => route('product-admin.destroy', $product->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
        }
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
    public function orderList()
    {
        $order = Order::query();
        if ($order) {
            return DataTables::of($order)
            ->addColumn('action', function ($order) {
                return view('admin.order.action', [
                    'order' => $order,
                    'url_edit' => route('order-admin.show', $order->id),
                    'url_destroy' => route('order-admin.destroy', $order->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
        }
    }

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
    public function userList()
    {
        $user = User::query();
        if ($user) {
            return DataTables::of($user)
            ->addColumn('action', function ($user) {
                return view('admin.user.action', [
                    'user' => $user,
                    'url_edit' => route('user-admin.show', $user->id),
                    'url_destroy' => route('user-admin.destroy', $user->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
        }
    }

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