@extends('layouts.custome')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Edit Form</h4>
        </div>
        <div class="col-lg-12">
            <form action="{!! route('order-admin.update', $order->id) !!}" method="POST">
                @csrf @method('patch')
                <div class="form-group">
                    <label for="product">product</label>
                    <input value="{{old('product') ?? $order->product}}" name="product" type="text" class="form-control @error('product') is-invalid @enderror" id="product">
                    @error('product')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_order">Total Order</label>
                    <input value="{{old('total_order') ?? $order->total_order}}" name="total_order" type="number" class="form-control @error('total_order') is-invalid @enderror" id="total_order">
                    @error('total_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>
        </div>
    </div>
@endsection

