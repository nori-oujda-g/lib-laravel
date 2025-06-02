@extends('layouts.master')
@section('title')
    my pubs
@endsection
@section('main')
    <h2> my pubs</h2>
    <div class="row justify-content-center align-items-center g-2 r0 l0">
        @if (!empty(auth('customer')->user()))
            @foreach ($publications as $publication)
                @if (auth('customer')->user()->id == $publication->customer_id)
                    <x-publication :publication="$publication" :optimise="true" :editor="false" />
                @endif
            @endforeach
        @endif
    </div>
@endsection
