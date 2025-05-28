@extends('layouts.master')
@section('title')
    new customer
@endsection
@section('main')
    <h2>new customer</h2>
    <a name="" id="" class="btn btn-primary ms-2" href="{{ route('customers.index') }}" role="button"><i
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
    <form method="POST" action="{{ route('customers.store') }}" class="container col-6" enctype="multipart/form-data">
        @csrf
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="name" class="col-form-label">NAME</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="avatar" class="col-form-label">AVATAR</label>
            </div>
            <div class="col-auto col-6">
                <input type="file" id="avatar" name="avatar" {{-- value="{{ old('name') }}"  --}} class="form-control">
                {{-- @error('name')
                    <small class="text-danger">{{ $message }} </small>
                @enderror --}}
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="email" class="col-form-label">EMAIL</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control">
                @error('email')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="image" class="col-form-label">IMAGE</label>
            </div>
            <div class="col-auto col-6">
                <input type="text" id="image" name="image" value="{{ old('image') }}" class="form-control">
                @error('image')
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
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="password_confirmation" class="col-form-label">CONFIRM PASSWORD</label>
            </div>
            <div class="col-auto col-6">
                <input type="password" id="password_confirmation" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" class="form-control">
                {{-- il faux respecter x_confirmation --}}
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="row  align-items-center mt-1">
            <div class="col-auto col-6">
                <label for="bio" class="col-form-label">DESCRIPTION</label>
            </div>
            <div class="col-auto col-6">
                <textarea class="form-control" name="bio" id="" rows="3">{{ old('bio') }}</textarea>
            </div>
        </div>
        <div class="d-grid mt-1">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="bi bi-file-earmark-plus-fill"></i>
            </button>
        </div>
    </form>
@endsection
