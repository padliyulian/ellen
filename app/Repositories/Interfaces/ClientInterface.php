<?php

namespace App\Repositories\Interfaces;

interface ClientInterface
{
    public function productList($paginate);

    public function productDetail($product);
    
    public function productOrder($request);
}