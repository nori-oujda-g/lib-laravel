@extends('layouts.master')
@section('title')
    customers
@endsection
@section('main')
    <h2>list customers</h2>
    <a name="" id="" class="btn btn-primary" href="{{ route('create') }}" role="button">add</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">BIO</th>
                <th scope="col">IMAGE</th>
                <th scope="col">SHOW</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }} </th>
                    <td>{{ $customer->name }} </td>
                    <td>{{ $customer->email }} </td>
                    <td>{{ Str::limit($customer->bio, 50, '...') }} </td>
                    <td><img src="{{ $customer->image }}" alt="" width="{{ $size }}"
                            height="{{ $size }}" srcset=""> </td>
                    <td><a name="" id="" class="btn btn-primary"
                            href="{{ route('customer', $customer->id) }}" role="button">
                            show
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->links() }}
    {{-- $customers->links() : est pour appler la pagination , par defaut elle fonctionne par taillwind, pour qu'elle fonctionne
    par bootstrap aller au fichier :exp1/app/Providers/AppServiceProvider.php , et dans la methode boot ajouer cette
    instruction : Paginator::useBootstrapFive(); c.a.a on vas appliquer bootstrap5
    exp1/app/Providers --}}
@endsection
