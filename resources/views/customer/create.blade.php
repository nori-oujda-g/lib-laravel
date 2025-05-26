@extends('layouts.master')
@section('title')
    new customer
@endsection
@section('main')
    <h2>new customer</h2>
    <a name="" id="" class="btn btn-primary" href="{{ route('customers') }}" role="button">return</a>
    <form method="POST" action="{{ route('store') }}" class="container col-6">
        @csrf
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="name" class="col-form-label">NAME</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="name" name="name" class="form-control">
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="email" class="col-form-label">EMAIL</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="email" name="email" class="form-control">
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="image" class="col-form-label">IMAGE</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="image" name="image" class="form-control">
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="bio" class="col-form-label">DESCRIPTION</label>
            </div>
            <div class="col-auto col-6">
                <textarea class="form-control" name="bio" id="" rows="3"></textarea>
            </div>
        </div>
        <div class="d-grid mt-1">
            <button type="submit" class="btn btn-primary btn-block">
                Submit
            </button>
        </div>
    </form>
@endsection
