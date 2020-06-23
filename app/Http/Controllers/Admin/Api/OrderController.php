<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AdminInterface;

class OrderController extends Controller
{
    private $model;

    public function __construct(AdminInterface $model)
    {
        $this->model = $model;
    }
    
    public function index()
    {
        $orders = $this->model->orderList();
        return $orders;
    }
}
