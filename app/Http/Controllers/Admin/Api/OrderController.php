<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Yajra\DataTables\Datatables;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::query();

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
