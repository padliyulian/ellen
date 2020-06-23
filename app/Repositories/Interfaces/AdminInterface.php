<?php

namespace App\Repositories\Interfaces;

interface AdminInterface
{
    public function productList($paginate);

    public function productStore($request);

    public function productShow($id);

    public function productUpdate($request, $id);

    public function productDelete($id);
}