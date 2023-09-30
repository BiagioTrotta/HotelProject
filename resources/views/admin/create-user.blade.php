<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5">
                <livewire:create-user />
            </div>
            <div class="col-lg-7">
                <livewire:list-users />
            </div>
        </div>
    </div>
</x-main>