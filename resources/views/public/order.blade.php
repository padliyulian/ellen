@extends('layouts.custome')

@section('content')
    @if (@isset($status))
        <div class="row">
            <div class="col-lg-12">
                <h4>{{$status}}</h4>
            </div>
        </div>
    @endif    
    @if (@isset($order))
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex justify-content-between">
                    <span>Order No.</span>
                    <span>{{$order->id}}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Product Name</span>
                    <span>{{$order->product}}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Qty</span>
                    <span>1 pcs</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Total</span>
                    <span>Rp. {{$order->total_order}}</span>
                </div>
            </div>
        </div>
    @endif
@endsection
