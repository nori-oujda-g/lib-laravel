@extends('layouts.master')
@section('title')
    all pubs
@endsection
@section('main')
    <h2 class="ms-2"> all pubs</h2>
    <div class="row justify-content-center align-items-center g-2 r0 l0">
        @foreach ($publications as $publication)
            <x-publication :publication="$publication" :optimise="false" :editor="true" />
        @endforeach
    </div>
@endsection
