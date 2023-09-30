<div class="container mb-4">
    <div class="row">

        <div class="col-12">
            @if($category)
            <h2>Edit category <i class="fa-solid fa-list"></i></h2>
            @else
            <h2>Add Category <i class="fa-solid fa-list"></i></h2>
            @endif
        </div>

        <div class="col-12">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

        </div>

        <div class="col-12">
            <button class="btn btn-sm btn-dark" wire:click="newCategory"><i class="fa-solid fa-plus"></i> NewCategory</button>
        </div>

        <form wire:submit.prevent="createCategory">

            <div class="form-group my-2">
                <label for="name">Name:</label>
                <input type="text" wire:model="name" class="form-control" id="name">
                @error('name') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>
</div>