@extends('layouts.custome')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Edit Form</h4>
        </div>
        <div class="col-lg-12">
            <form action="{!! route('user-admin.update', $user->id) !!}" method="POST">
                @csrf @method('patch')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{old('name') ?? $user->name}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{old('email') ?? $user->email}}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Repeat Password</label>
                    <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>
        </div>
    </div>
@endsection

