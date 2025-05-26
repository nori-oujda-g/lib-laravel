{{-- @props(['nom', 'users']) --}}
<div>
    <h6>mon composant users-comp appel des données depuis le controlleur du composant</h6>
    nom : {{ $nom }}
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
</div>
