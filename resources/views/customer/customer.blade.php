@extends('layouts.master')
@section('title')
    one customer
@endsection
@section('main')
    <h2>page one customer</h2>
    {{-- <h6>customer= {{ $customer->name }} </h6>
    <img src="{{ $customer->image }}" alt=""> --}}
    <a name="" id="" class="btn btn-primary ms-2" href="{{ route('customers.index') }}" role="button"><i
            class="bi bi-arrow-return-left"></i></a>

    <div class="card container col-5"
        style="
            background-color:$ {
                1: orangered;
            }
            border-color:$ {
                2: darkblue;
            }
        ">
        <h4 class="card-title pt-2 ">
            <span class="mt-2 text-center">{{ $customer->name }}</span>
            <img class="card-img-top float-end" src="{{ asset('storage/' . $customer->avatar) }}" alt="Title"
                style="width: 80px;height:80px;" />
            {{-- 
                ce lien dans le debut ne vas pas fonctionner, il faut creer un racourci du dossier storage ôu on a les image vers le 
                dossier public par la commande: php artisan storage:link
                --}}
        </h4>
        <img class="mt-2 card-img-top" src="{{ $customer->image }}" alt="Title" />
        <div class="card-body">

            <p class="card-text">{{ $customer->bio }}</p>
            <div class="card-footer text-muted">
                <p class="card-text">{{ $customer->email }}</p>
                <span class="text-danger">{{ $customer->created_at->format('d-m-Y') }} </span>
                {{-- d-m-Y ==> 28-05-2025 --}}
                {{-- d-m-y ==> 28-05-25 --}}
            </div>
        </div>
    </div>
@endsection
