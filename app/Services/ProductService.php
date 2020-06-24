<?php

namespace App\Services;

use App\Repositories\Interfaces\ClientInterface;
use App\Repositories\Interfaces\AdminInterface;

class ProductService
{
    private $client;
    private $admin;

    public function __construct(ClientInterface $client, AdminInterface $admin)
    {
        $this->client = $client;
        $this->admin = $admin;
    }

    // client
    public function productList($paginate)
    {
        return $this->client->productList($paginate);
    }

    public function productDetail($product)
    {
        return $this->client->productDetail($product);
    }

    public function productOrder($request)
    {
        return $this->client->productOrder($request);
    }


    // admin
    public function productLists()
    {
        return $this->admin->productList();
    }

    public function productStore($request)
    {
        return $this->admin->productStore($request);
    }

    public function productUpdate($request, $product)
    {
        return $this->admin->productUpdate($request, $product);
    }

    public function productDelete($product)
    {
        return $this->admin->productDelete($product);
    }
}