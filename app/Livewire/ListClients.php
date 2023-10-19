<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;


class ListClients extends Component
{
    public $clients;

    protected $listeners = [
        'loadClients'
    ];

    public function mount()
    {
        $this->loadClients();
    }

    public function loadClients()
    {
        $this->clients = Client::all();
    }

    public function editClient($client_id)
    {
        $this->dispatch('edit', $client_id);
    }

    public function deleteClient($client_id)
    {
        $client = Client::find($client_id);
        $client->delete();
        session()->flash('success', 'User successfully delete');
        $this->loadClients();
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.list-clients', [
            'clienti' => Client::paginate(3),
        ]);
    }
}
