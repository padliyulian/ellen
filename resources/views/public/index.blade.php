@extends('layouts.custome')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Product</h4>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $item)
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <img src="{{ asset('images/product/p.jpeg') }}" class="card-img-top" alt="product">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">Rp. {{$item->price}}</p>
                        <a href="{!! route('product.show', ['product' => $item->id]) !!}" class="btn btn-success btn-block">Beli</a>
                    </div>
                </div>
            </div>    
        @endforeach
        <div class="col-12">
            <div class="d-flex justify-content-center">{{$products->links()}}</div>
        </div>
    </div>
@endsection

