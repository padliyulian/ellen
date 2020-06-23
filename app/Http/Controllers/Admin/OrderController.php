<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Order as OrderRequest;
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
        return view('admin.order.index');
    }

    public function show($order)
    {
        $order = $this->model->orderShow($order);
        return view('admin.order.edit', compact('order'));
    }

    public function update(OrderRequest $request, $order)
    {
        $this->model->orderUpdate($request, $order);
        return view('admin.order.index')->withStatus('Update Success');
    }

    public function destroy($order)
    {
        $this->model->orderDelete($order);
    }
}
