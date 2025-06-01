@props(['publication', 'optimise', 'editor'])
<div class="w-50 card text-start pt-2 mx-1 bg-light">
    @if ($publication->image)
        <img class="card-img-top img-fluid h300" src="{{ asset('storage/' . $publication->image) }}" alt="Title" />
    @endif
    <div class="card-body">
        @if ($optimise)
            <a name="" id="" class="btn btn-warning float-end text-white"
                href="{{ route('publications.edit', $publication->id) }}" role="button"><i
                    class="bi bi-pen-fill"></i></a>
            <form action="{{ route('publications.destroy', $publication->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('are you sure delete this pub ?')"
                    class="btn btn-danger float-end mx-2">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        @endif
        <h4 class="card-title">{{ $publication->title }} </h4>
        <p class="card-text">{{ $publication->body }} </p>
    </div>
    @if ($editor)
        <div class="card-footer row justify-content-end align-items-end g-2">
            <p class="col text-strat fw-bold ps-1 pb-4">published by:</p>
            <ul class="col text-end " style="list-style-type: none;">
                <li style="float: right;" class="mx-1">
                    <a name="" id="" class="btn btn-info text-light mt-2 "
                        href="{{ route('customers.show', $publication->customer->id) }}" role="button">
                        <i class="bi bi-eye"></i></a>
                </li>
                <li style="float: right;" class="mx-1"> <img
                        src="{{ asset('storage/' . $publication->customer->avatar) }}" style="width: 50px;height:50px; "
                        class="float-end rounded-circle" alt="" />
                </li>
                <li style="float: right;" class="mx-1">
                    <p class="btn text-end pt-3">{{ $publication->customer->name }} </p>
                </li>
            </ul>
        </div>
    @endif
</div>
