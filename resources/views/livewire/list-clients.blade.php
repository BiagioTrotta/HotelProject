<div>
    <h2>List Clients</h2>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Surname</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class=" table-group-divider">
                @foreach ($clienti as $client)
                <tr>
                <td><i class="fa-solid fa-user"></i> {{ $client->surname }}</td>
                    <td><i class="fa-solid fa-user"></i> {{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-dark fa" wire:click="editClient({{$client->id}})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-sm btn-danger fa" wire:click="deleteClient({{$client->id}})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $clienti->links() }}
</div>