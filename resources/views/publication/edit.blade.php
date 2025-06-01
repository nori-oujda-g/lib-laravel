@extends('layouts.master')
@section('title')
    update publication
@endsection
@section('main')
    <h2>update publication</h2>
    <a name="" id="" class="btn btn-primary ms-2" href="{{ route('publications.index') }}" role="button"><i
            class="bi bi-arrow-return-left"></i></a>
    @if ($errors->any())
        <x-alert type="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style-type: disclosure-closed;">{{ $error }} </li>
                @endforeach
            </ul>
        </x-alert>
    @endif
    <form method="POST" action="{{ route('publications.update', $publication->id) }}" class="container col-6"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="title" class="col-form-label">TITLE</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="title" name="title" value="{{ old('title', $publication->title) }}"
                    class="form-control">
                @error('title')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="row  align-items-center mt-1 card">
            <img src="{{ asset('storage/' . $publication->image) }}" class="mt-2 w-25 h-25 card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">IMAGE</h5>
                <p class="card-text"><input type="file" id="image" name="image" class="form-control"> </p>
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="body" class="col-form-label">BODY</label>
            </div>
            <div class="col-auto col-6">
                <textarea class="form-control" name="body" id="" rows="3">{{ old('body', $publication->body) }}</textarea>
                @error('body')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="d-grid mt-1">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </form>
@endsection
