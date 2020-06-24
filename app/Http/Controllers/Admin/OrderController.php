<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order as OrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return view('admin.order.index');
    }

    public function show($order)
    {
        $order = $this->orderService->orderShow($order);
        return view('admin.order.edit', compact('order'));
    }

    public function update(OrderRequest $request, $order)
    {
        $this->orderService->orderUpdate($request, $order);
        return view('admin.order.index')->withStatus('Update Success');
    }

    public function destroy($order)
    {
        return $this->orderService->orderDelete($order);
    }
}
