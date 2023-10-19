<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class CreateClient extends Component
{
    public $surname;
    public $name;
    public $email;
    public $client;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'surname' => 'required|min:2',
    ];

    protected $messages = [
        'email.email' => 'The attribute: address format is not valid.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Esporta metodo edit
    protected $listeners = [
        'edit'
    ];

    public function createClient()
    {
        // Validazione dei dati
        $this->validate();

        // Controlla se stai creando un nuovo utente o modificando un utente esistente
        if ($this->client) {
            // Modifica l'utente esistente
            $this->client->update([
                'name' => $this->name,
                'email' => $this->email, 
                'surname' => $this->surname,
            ]);

            // Emetti un messaggio di successo
            session()->flash('success', 'Utente modificato con successo.');
        } else {
            // Verifica l'unicità dell'email solo quando stai creando un nuovo utente
            $existingUser = Client::where('email', $this->email)->first();

            if ($existingUser) {
                // L'utente con questa email esiste già nel database
                session()->flash('error', 'The email entered is already associated with another user.');
            } else {
                // Creazione di un nuovo utente
                Client::create([
                    'name' => $this->name,
                    'email' => $this->email, 
                    'surname' => $this->surname,
                ]);

                // Emetti un messaggio di successo
                session()->flash('success', 'Utente creato con successo.');
            }
        }

        // Pulisci i campi del modulo dopo la creazione o la modifica
        $this->newClient();

        $this->dispatch('loadClients');
    }



    public function mount()
    {
        $this->newClient();
    }

    // Creazione nuovo utente
    public function newClient()
    {
        $this->client = '';
        $this->name = '';
        $this->email = '';
        $this->surname = '';
    }

    //Edita utente
    public function edit($client_id)
    {
        $this->client = Client::find($client_id);
        $this->name = $this->client->name;
        $this->email = $this->client->email;
        $this->surname = $this->client->surname;
    }

    public function render()
    {
        return view('livewire.create-client');
    }
}
