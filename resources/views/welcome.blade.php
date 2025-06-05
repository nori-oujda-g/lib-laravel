@extends('layouts.master')
@section('title')
    home
@endsection
@section('main')
    <h2>page home 222</h2>
    <p>number of visits : <span class="badge bg-warning text-dark">{{ $counter }}</span> </p>
    <div id="root"></div>
    <a class="btn btn-primary ms-4 mt-4" href="{{ route('home.mail') }}" role="button"><i
            class="bi bi-envelope-at-fill"></i></a>
@endsection
