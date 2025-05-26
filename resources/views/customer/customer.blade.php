@extends('layouts.master')
@section('title')
    one customer
@endsection
@section('main')
    <h2>page one customer</h2>
    {{-- <h6>customer= {{ $customer->name }} </h6>
    <img src="{{ $customer->image }}" alt=""> --}}
    <a name="" id="" class="btn btn-primary" href="{{ route('customers') }}" role="button">return</a>

    <div class="card container col-5"
        style="
            background-color:$ {
                1: orangered;
            }
            border-color:$ {
                2: darkblue;
            }
        ">
        <img class="mt-2 card-img-top" src="{{ $customer->image }}" alt="Title" />
        <div class="card-body">
            <h4 class="card-title">{{ $customer->name }}</h4>
            <p class="card-text">{{ $customer->bio }}</p>
            <div class="card-footer text-muted">
                <p class="card-text">{{ $customer->email }}</p>
            </div>
        </div>
    </div>
@endsection
