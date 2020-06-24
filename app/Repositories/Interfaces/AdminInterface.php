<?php

namespace App\Repositories\Interfaces;

interface AdminInterface
{
    // product
    public function productList();
    public function productStore($request);
    public function productUpdate($request, $id);
    public function productDelete($id);

    // order
    public function orderList();
    public function orderShow($id);
    public function orderUpdate($request, $id);
    public function orderDelete($id);

    // user
    public function userList();
    public function userShow($id);
    public function userUpdate($request, $id);
    public function userDelete($id);
}