@extends('layouts.custome')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Create Form</h4>
        </div>
        <div class="col-lg-12">
            <form action="{!! route('product-admin.store') !!}" method="POST">
                @csrf
                @include('admin.product.form', [
                    'btn_title' => 'Save',
                    'product' => new App\Models\Product,
                ])
            </form>
        </div>
    </div>
@endsection

