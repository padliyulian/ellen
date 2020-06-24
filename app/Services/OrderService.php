<?php

namespace App\Services;

use App\Repositories\Interfaces\AdminInterface;

class OrderService
{
    private $admin;

    public function __construct(AdminInterface $admin)
    {
        $this->admin = $admin;
    }

    public function orderList()
    {
        return $this->admin->orderList();
    }

    public function orderShow($order)
    {
        return $this->admin->orderShow($order);
    }

    public function orderUpdate($request, $order)
    {
        return $this->admin->orderUpdate($request, $order);
    }

    public function orderDelete($order)
    {
        return $this->admin->orderDelete($order);
    }
}