<?php

namespace App\Http\Controllers\Admin\Api\v1;

use App\Http\Controllers\Controller;
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
        $orders = $this->orderService->orderList();
        return $orders;
    }
}
