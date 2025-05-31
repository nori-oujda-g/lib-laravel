@extends('layouts.master')
@section('title')
    test
@endsection
@section('main')
    <form action="{{ route('form') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">name</label>
            <input type="text" class="form-control" name="nom" placeholder="nom">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">date</label>
            <input type="date" class="form-control" name="mydate">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="" id="" class="btn btn-primary">
                submit
            </button>
        </div>

    </form>
@endsection
