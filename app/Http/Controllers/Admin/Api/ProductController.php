<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Datatables;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::query();

        return DataTables::of($product)
        ->addColumn('action', function ($product) {
            return view('admin.product.action', [
                'product' => $product,
                'url_edit' => route('product-admin.show', $product->id),
                'url_destroy' => route('product-admin.destroy', $product->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
}
