<div>
    <h2>List Categories</h2>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($categorie as $category)
            <tr>
                <td><i class="fa-solid fa-hashtag"></i> {{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-dark fa" wire:click="editCategory({{$category->id}})"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-sm btn-danger fa" wire:click="deleteCategory({{$category->id}})"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categorie->links() }}
</div>