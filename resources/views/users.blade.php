@extends('layouts.master')
@section('title')
    users
@endsection
@section('main')
    <h2>les users </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">JOB</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user['id'] }} </th>
                    <td>{{ $user['name'] }} </td>
                    <td>{{ $user['email'] }} </td>
                    <td>{{ $user['job'] }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-users-comp />
    <hr>
    <x-users-comp2 nom="bouaicha" :users="$users" />
    <x-alert type="danger">
        <strong>un alert test</strong>
    </x-alert>
    <x-master2 title="master2">
        <h4>contenu</h4>
    </x-master2>
@endsection
