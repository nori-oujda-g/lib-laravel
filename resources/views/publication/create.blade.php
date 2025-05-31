@extends('layouts.master')
@section('title')
    new publication
@endsection
@section('main')
    <h2>new publication</h2>
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
    <form method="POST" action="{{ route('publications.store') }}" class="container col-6" enctype="multipart/form-data">
        @csrf
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="title" class="col-form-label">TITLE</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                @error('title')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="image" class="col-form-label">IMAGE</label>
            </div>
            <div class="col-auto col-6">
                <input type="file" id="image" name="image" {{-- value="{{ old('title') }}"  --}} class="form-control">
                {{-- @error('title')
                    <small class="text-danger">{{ $message }} </small>
                @enderror --}}
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="body" class="col-form-label">BODY</label>
            </div>
            <div class="col-auto col-6">
                <textarea class="form-control" name="body" id="" rows="3">{{ old('body') }}</textarea>
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
