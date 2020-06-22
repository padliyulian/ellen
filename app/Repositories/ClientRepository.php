<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Interfaces\ClientInterface;

class ClientRepository implements ClientInterface
{
    public function productList($paginate)
    {
        $products = Product::paginate($paginate);
        return $products;
    }

    public function productDetail($product)
    {
        $result = Product::findOrFail($product);
        return $result;
    }

    public function productOrder($request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        
        if ($customer->save()) {
            $order = new Order;
            $order->customer_id = $customer->id;
            $order->product = $request->product;
            $order->total_order = $request->total_order;
            if ($order->save()) {
                return $order;
            }
        }
    }
}