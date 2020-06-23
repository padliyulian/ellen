@extends('layouts.custome')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Create Form</h4>
        </div>
        <div class="col-lg-12">
            <form action="{!! route('product-admin.store') !!}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input value="{{old('price')}}" name="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection

