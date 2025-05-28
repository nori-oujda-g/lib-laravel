@extends('layouts.master')
@section('title')
    customers
@endsection
@section('main')
    <h2>list customers</h2>
    <a name="" id="" class="btn btn-primary ms-2" href="{{ route('create') }}" role="button">
        <i class="bi bi-file-earmark-plus-fill"></i>
    </a>
    @php
        $mt = 'mt-2';
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">BIO</th>
                <th scope="col">IMAGE</th>
                <th scope="col">SHOW</th>
                <th scope="col">UPDATE</th>
                <th scope="col">DEL</th>
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
                    <td><a name="" id="" class="btn btn-info text-light {{ $mt }}"
                            href="{{ route('customer', $customer->id) }}" role="button">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('edit', $customer->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-warning text-light {{ $mt }}">
                                <i class="bi bi-pen-fill"></i>
                            </button>
                        </form>
                        {{-- <a class="btn btn-warning text-light {{ $mt }}" href="{{ route('edit', $customer) }}"
                            role="button"><i class="bi bi-pen-fill"></i></a> --}}

                    </td>
                    <td>
                        <form action="{{ route('delete', $customer->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            {{-- csrf pour le probleme:page expired --}}
                            <button type="submit" class="btn btn-danger text-light {{ $mt }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
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
