@extends('layouts.custome')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Order Information</h4>
        </div>
        <div class="col-lg-12">
            <div>{{$product->id}} - {{$product->name}}</div>
            <div>Rp. {{$product->price}}</div>
            <div>Qty 1 pcs</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pt-4">
            <h4>Customer Information</h4>
        </div>
        <div class="col-lg-12">
            <form action="{!! route('product.order') !!}" method="POST">
                @csrf
                <input type="hidden" name="product" value="{{$product->name}}">
                <input type="hidden" name="total_order" value="{{$product->price}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input value="{{old('phone')}}" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" id="phone">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea value="{{old('address')}}" name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="5"></textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block">Beli</button>
            </form>
        </div>
    </div>
@endsection
