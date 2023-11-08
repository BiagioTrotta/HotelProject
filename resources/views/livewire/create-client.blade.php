<div class="container mb-4">
    <div class="row">

        <div class="col-12">
            @if($client)
            <h2>Modifica Cliente<i class="fa-solid fa-user"></i></h2>
            @else
            <h2>Aggiungi Cliente <i class="fa-solid fa-user"></i></h2>
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
            <button class="btn btn-sm btn-dark" wire:click="newClient"><i class="fa-solid fa-plus"></i> NewClient</button>
        </div>

        <form wire:submit.prevent="createClient">
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" wire:model="surname" class="form-control" id="surname">
                @error('surname') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" wire:model="name" class="form-control" id="name">
                @error('name') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" wire:model="email" class="form-control" id="email">
                @error('email') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" wire:model="telefono" class="form-control" id="telefono">
                @error('telefono') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-dark mt-2">Salva</button>
        </form>
    </div>
</div>