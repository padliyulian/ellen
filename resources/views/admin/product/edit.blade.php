@extends('layouts.custome')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Edit Form</h4>
        </div>
        <div class="col-lg-12">
            <form action="{!! route('product-admin.update', $product->id) !!}" method="POST">
                @method('patch')
                @csrf
                @include('admin.product.form', ['btn_title' => 'Update'])
            </form>
        </div>
    </div>
@endsection

