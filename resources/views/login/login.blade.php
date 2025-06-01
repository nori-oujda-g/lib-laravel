@extends('layouts.master')
@section('title')
    login
@endsection
@section('main')
    <h2>Authentification</h2>
    <form method="POST" action="{{ route('connect') }}" class="container col-6">
        @csrf
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="login" class="col-form-label">LOGIN</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="login" name="login" value="{{ old('login') }}" class="form-control">
                @error('login')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="password" class="col-form-label">PASSWORD</label>
            </div>
            <div class="col-auto col-6">
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control">
                @error('password')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="d-grid mt-1">
            <button type="submit" class="btn btn-primary btn-block">
                SIGN IN
            </button>
        </div>
        <div class="d-grid mt-1">
            <a name="" id="" class="btn btn-secondary btn-block" href="{{ route('customers.create') }}"
                role="button">CREATE AN ACCOUNT</a>
        </div>
    </form>
@endsection
