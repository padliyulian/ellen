<?php

namespace App\Repositories\Interfaces;

interface AdminInterface
{
    // product
    public function productList($paginate);
    public function productStore($request);
    public function productShow($id);
    public function productUpdate($request, $id);
    public function productDelete($id);

    // order
    public function orderShow($id);
    public function orderUpdate($request, $id);
    public function orderDelete($id);
}