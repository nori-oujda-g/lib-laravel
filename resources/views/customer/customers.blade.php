@extends('layouts.master')
@section('title')
    customers
@endsection
@section('main')
    <h2>list customers</h2>
    @if (!empty(Auth::guard('customer')->user()))
        <a name="" id="" class="btn btn-primary ms-2" href="{{ route('customers.create') }}" role="button">
            <i class="bi bi-file-earmark-plus-fill"></i>
        </a>
    @endif
    @php
        $mt = 'mt-2';
    @endphp
    <table class="table table-striped">
        {{-- @if (!empty(Auth::guard('customer')->user())) --}}
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">BIO</th>
                <th scope="col">IMAGE</th>
                <th scope="col">SHOW</th>
                @if (!empty(Auth::guard('customer')->user()))
                    <th scope="col">UPDATE</th>
                    <th scope="col">DEL</th>
                @endif
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
                            href="{{ route('customers.show', $customer->id) }}" role="button">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                    @if (!empty(Auth::guard('customer')->user()))
                        <td>
                            <form action="{{ route('customers.edit', $customer->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-warning text-light {{ $mt }}">
                                    <i class="bi bi-pen-fill"></i>
                                </button>
                            </form>
                            {{-- <a class="btn btn-warning text-light {{ $mt }}" href="{{ route('edit', $customer) }}"
                            role="button"><i class="bi bi-pen-fill"></i></a> --}}

                        </td>
                        <td>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                {{-- csrf pour le probleme:page expired --}}
                                <button type="submit" class="btn btn-danger text-light {{ $mt }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    @endif
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
